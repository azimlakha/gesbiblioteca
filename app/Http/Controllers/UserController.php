<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
     	public function index(){

       $users = User::all();

       return view('auth.index', compact('users'));
    }

        public function signup(){

       return view('auth.register');
   }

        public function signup_su(){

       return view('auth.register_su');
   }
    

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:8|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('signup_su')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subscribe        = new User;
        $subscribe->name = $request->name;
        $subscribe->surname = $request->surname;
        $subscribe->email = $request->email;
        $subscribe->phone = $request->phone;
        $subscribe->password = bcrypt($request->password);
        $subscribe->profile_id = $request->profile_id;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('user')->with('message','User adicionado com sucesso!');
    }
}
