<?php

namespace App\Http\Controllers;

use Validator;
use DateTime;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Copy;

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
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('booking/$request->book_id/create')
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

        $user = auth()->user();
        $subscribe        = new Booking;
        //$subscribe->cod_booking = $request->cod_booking;
        $subscribe->start_date = $request->start_date;
        $subscribe->end_date = $request->end_date;
        $subscribe->user_id = 1;
        $subscribe->copy_id =  $copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();
        $randomString = str_random(25);
 
         return redirect()->route('homepage')->with('message','Rsereva efectuada com sucesso!');
    }
}
