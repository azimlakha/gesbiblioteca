<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Book;

class WishlistController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
           $book = Book::find($id);
           return view('wishlist.register', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:subjects',
        ]);

        if ($validator->fails()) {
            return redirect('subject/create')
                        ->withErrors($validator)
                        ->withInput();
        }*/
        $book = Book::find($request->book_id);
        $book->users()->attach(Auth::user()->id);

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('homepage')->with('message','Livro guardado com sucesso!');
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
        $subject = Subject::find($id);

        return view('subject.edit', compact('subject'));
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
         {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return redirect('subject/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = Subject::find($id);
        $subscribe->name = $request->name;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('subject')->with('message','Disciplina actualizada com sucesso!');
    }
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