<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
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
       $books = Book::all();
       foreach ($books as $book){
          $copy=DB::table('copies')->where ('book_id','=', $book->id)
                                   ->where('conservation','=','Bom')
                                   ->get();
          If ($copy->isEmpty()){
              $copies[$book->id]=0;
          }
          else{
              $copies[$book->id]=1;
          }
       } 
       return view('homepage.index', compact('books','copies'));
    }

    public function search(Request $request)
    {

          $books = Book::where('title','like', '%'.$request->title.'%')
                        ->whereHas('authors', function ($query) use ($request){
                  $query->where('name', 'like', '%'.$request->author.'%');
          })->get();

   /*       $books = DB::table('books')->where('title','like', '%'.$request->title.'%')
                                    ->get();
          $i=0;
          foreach($books as $book){
            foreach($authors as $author){
              $i++;
              if ($book->authors->id == $author)
                $results[$i]=$book;    
            }
          }*/

           return view('homepage.search', compact('books'));
    }
}
