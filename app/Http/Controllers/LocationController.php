<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Location;
use App\Section;
use App\Bookcase;
use App\Shelf;

class LocationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $locations = Location::all();

       return view('location.index', compact('locations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $sections = Section::all();
           $bookcases = Bookcase::all();
           $shelfs = Shelf::all();
           return view('location.register', compact('sections', 'bookcases', 'shelfs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*   $validator = Validator::make($request->all(), [
            'section_id' => 'required|unique_with:locations, bookcase_id, shelf_id',
            'bookcase_id' => 'required',
            'shelf_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('location/create')
                        ->withErrors($validator)
                        ->withInput();
        }
*/
        $subscribe        = new location;
        $subscribe->section_id = $request->section_id;
        $subscribe->bookcase_id = $request->bookcase_id;
        $subscribe->shelf_id = $request->shelf_id;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('location')->with('message','Localização adicionada com sucesso!');
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
