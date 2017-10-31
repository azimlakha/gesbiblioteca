<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Author;

class AuthorController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $authors = Author::all();

       return view('author.index', compact('authors'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('author.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:authors',
        ]);

        if ($validator->fails()) {
            return redirect('author/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = new Author;
        $subscribe->name = $request->name;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('author')->with('message','Autor adicionado com sucesso!');
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
       // $author = Author::find($id);

       // return view('author.edit', compact('author'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit', compact('author'));
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
          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|',
        ]);

        if ($validator->fails()) {
            return redirect('author/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        =  Author::find($id);
        $subscribe->name = $request->name;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('author')->with('message','Autor Actualizado com sucesso!');


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
