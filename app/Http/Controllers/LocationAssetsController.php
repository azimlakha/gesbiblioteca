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
            for ($i = 1; $i <= $request->component_num; $i++){
                $subscribe        = new Section;
                $subscribe->name = $request->prefix.$i;
                $subscribe->save();
            }
        }
         if ($request->component == 'bookcase') {
            for ($i = 1; $i <= $request->component_num; $i++){
                $subscribe        = new Bookcase;
                $subscribe->name = $request->prefix.$i;
                $subscribe->save();
            }
        }  
        if ($request->component == 'shelf') {
            for ($i = 1; $i <= $request->component_num; $i++){
                $subscribe        = new Shelf;
                $subscribe->name = $request->prefix.$i;
                $subscribe->save();
            }
        }     

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->back();
    }
}