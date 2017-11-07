<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Booking;

class BookingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = Book::all();

       return view('homepage.index', compact('books'));
    }

    public function create($id)
    {

           $book = Book::find($id);

           return view('booking.register', compact('book'));
    }

    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
        /*    'title' => 'required|string|255',*/
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('booking/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $i=0;

        do{
            $i++;
           $copy=DB::table('copies')->where ('id','=', $i)
                                    ->where ('book_id','=', $request->book_id)
                                    ->where('conservation','=','Bom')
                                    ->get()->first();
           $num=DB::table('Bookings')->where('copy_id', '=',$copy->id)
                                      ->where('start_date','=',$request->start_date)
                                     ->where('end_date', '=',$request->end_date)->count();
           if($num==0){

            $copy_id= $copy->id;

           }    
        }while ($num<>0); 
            
        $subscribe        = new Booking;
        //$subscribe->cod_booking = $request->cod_booking;
        $subscribe->start_date = $request->start_date;
        $subscribe->end_date = $request->end_date;
        $subscribe->user_id = 1;
        $subscribe->copy_id =  $copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('homepage')->with('message','Rsereva efectuada com sucesso!');
    }
}
