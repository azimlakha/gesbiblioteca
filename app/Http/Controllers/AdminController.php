<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    public function bookings()
    {
           $bookings = Booking::all();
           return view('admin.bookings', compact('bookings'));
    }
}
