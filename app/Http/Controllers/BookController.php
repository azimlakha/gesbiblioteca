<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Book;
use App\Publisher;
use App\Subject;
use App\Knowledge_area;
use App\Author;

class BookController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = Book::all();

       return view('book.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $publishers = Publisher::all();
           $subjects = Subject::all();
           $knowledge_areas = Knowledge_area::all();
           $authors = Author::all();
           return view('book.register', compact('publishers', 'subjects', 'knowledge_areas', 'authors'));
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
        /*    'title' => 'required|string|255',
            'edition' => 'required|string|255',*/
            'ISBN' => 'required|string|max:14|min:10|unique:books',
        ]);

        if ($validator->fails()) {
            return redirect('book/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = new Book;
        $subscribe->title = $request->title;
        $subscribe->edition = $request->edition;
        $subscribe->ISBN = $request->ISBN;
        $subscribe->publisher_id = $request->publisher_id;
        $subscribe->subject_id = $request->subject_id;
        $subscribe->knowledge_area_id = $request->knowledge_area_id;
        $subscribe->knowledge_area_id = $request->knowledge_area_id;
        $subscribe->save();

        $book_id = $subscribe->id;

        $book = Book::find($book_id);
        $book->authors()->attach($request->author);

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('book')->with('message','Livro adicionado com sucesso!');
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
           $book = Book::find($id);
           $publishers = Publisher::all();
           $subjects = Subject::all();
           $knowledge_areas = Knowledge_area::all();
           $authors = Author::all();
           return view('book.edit', compact('book', 'publishers', 'subjects', 'knowledge_areas', 'authors'));
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
       $validator = Validator::make($request->all(), [
        /*    'title' => 'required|string|255',
            'edition' => 'required|string|255',*/
            'ISBN' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = Book::find($id);
        $subscribe->title = $request->title;
        $subscribe->edition = $request->edition;
        $subscribe->ISBN = $request->ISBN;
        $subscribe->publisher_id = $request->publisher_id;
        $subscribe->subject_id = $request->subject_id;
        $subscribe->knowledge_area_id = $request->knowledge_area_id;
        $subscribe->knowledge_area_id = $request->knowledge_area_id;
        $subscribe->save();

        /*ok_id = $subscribe->id;

        $book = Book::find($book_id);
        $book->authors()->attach($request->author);*/

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('book')->with('message','Livro actualizado com sucesso!');
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
