<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

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

    public function store(Request $request, $id)
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

        $subscribe        = new Booking;
        $subscribe->cod_booking = $request->cod_booking;
        $subscribe->start_date = $request->start_date;
        $subscribe->end_date = $request->end_date;
        $subscribe->user_id = $request->user_id;
        $subscribe->copy_id = $request->copy_id;
        $subscribe->status = 'reservado';
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('booking.index')->with('message','Rsereva efectuada com sucesso!');
    }
}
