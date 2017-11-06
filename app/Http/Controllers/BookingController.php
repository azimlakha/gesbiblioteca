<?php

namespace App\Http\Controllers;

use Validator;
use DateTime;
use Illuminate\Http\Request;
use App\Book;
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

        $randomString = str_random(25);

        $user = auth()->user();

        $book = Book::find($request->book_id);
        $copy = Copy::find($request->book_id, ['book_id']);
        if (count($copy) > 0) 
        {
        $subscribe        = new Booking;
        $subscribe->cod_booking = $randomString;
        $date = DateTime::createFromFormat('d-m-Y H:i:s', $request->start_date);
        $usableDate = $date->format('Y-m-d h:i:s');
        $subscribe->start_date = $usableDate;
        $subscribe->end_date = $usableDate;
        $subscribe->user_id = $user->id;
        $subscribe->copy_id = $copy->First()->id;
        $subscribe->status = 'reservado';
        $subscribe->save();
        }
         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('booking.index')->with('message','Resereva efectuada com sucesso!');
    }
}
