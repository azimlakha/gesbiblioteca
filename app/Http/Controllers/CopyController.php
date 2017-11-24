<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Copy;
use App\Book;
use App\Location;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $copies = Copy::where('book_id','=', $id)->get();

        return view('copy.index', compact('copies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book = Book::find($id);
        $locations = Location::all();
        return view('copy.register', compact('book', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i = 1; $i <= $request->copy_num; $i++){
            $subscribe        = new Copy;
            $subscribe->conservation = 'Bom';
            $subscribe->book_id = $request->book_id;
            $subscribe->location_id = $request->location_id;
            $subscribe->notes = $request->notes;
            $subscribe->save();
        }

        //return Redirect::to('/user')->with('message','User adicionado com sucesso!');

        return redirect()->route('copy', $request->book_id)->with('message','Exemplar(es) adicionado(s) com sucesso!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $books = Book::all();
        $locations = Location::all();
        $copy = Location::find($id);
        return view('copy.edit', compact('copy', 'books', 'locations'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
