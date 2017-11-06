<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Section;
use App\Bookcase;
use App\Shelf;

class LocationAssetsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('asset.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->component == 'section') {
               $num=Section::count();
            for ($i = 1; $i <= $request->component_num; $i++){
                $num++;
                $subscribe        = new Section;
                $subscribe->name = $request->prefix.$num;
                $subscribe->save();
            }
            return redirect()->route('section')->with('message','Seccao adicionada com sucesso!');
        }
         if ($request->component == 'bookcase') {
            $num=Bookcase::count();
            for ($i = 1; $i <= $request->component_num; $i++){
                $num++;
                $subscribe        = new Bookcase;
                $subscribe->name = $request->prefix.$num;
                $subscribe->save();
            }
            return redirect()->route('bookcase')->with('message','Estante adicionada com sucesso!');
        }  
        if ($request->component == 'shelf') {
               $num=Shelf::count();
            for ($i = 1; $i <= $request->component_num; $i++){
                $num++;
                $subscribe        = new Shelf;
                $subscribe->name = $request->prefix.$num;
                $subscribe->save();
            }
            return redirect()->route('shelf')->with('message','Prateleira adicionada com sucesso!');
        }     

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         //return redirect()->back();
    }
}