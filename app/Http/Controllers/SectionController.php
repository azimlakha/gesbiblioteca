<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Section;

class SectionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sections = Section::all();

       return view('section.index', compact('sections'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('section.register');
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
            'name' => 'required|string|max:255|unique:sections',
        ]);

        if ($validator->fails()) {
            return redirect('section/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = new Section;
        $subscribe->name = $request->name;
        $subscribe->description = $request->description;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('section')->with('message','Secção adicionada com sucesso!');
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
        $section = Section::find($id);

        return view('section.edit', compact('section'));
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
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('section/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = Section::find($id);
        $subscribe->name = $request->name;
        $subscribe->description = $request->description;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('section')->with('message','Secção actualizada com sucesso!');
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