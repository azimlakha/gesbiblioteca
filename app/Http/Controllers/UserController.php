<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Profile;

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
            'email' => 'required|string|email|max:255|unique:users',
            'code' => 'required|string|min:8|max:8|unique:profiles',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('signup_su')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user        = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user_id = $user->id;

        $profile = new Profile;
        $profile->user_id = $user_id;
        $profile->code = $request->code;
        $profile->profile = $request->profile;
        $profile->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('user')->with('message','User adicionado com sucesso!');
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
        $subscribe        =  Profile::find($id);
        $subscribe->surname = $request->surname;
        $subscribe->phone = $request->phone;
        $subscribe->save();

         //return Redirect::to('/user')->with('message','User adicionado com sucesso!');
         
         return redirect()->route('homepage')->with('message','Actualizado com sucesso!');
    }

    public function edit(){
        $user = User::find(Auth::user()->id);
        return view('auth.profile', compact('user'));
    }

    public function edituser($id){
        $user = User::find($id);
        return view('auth.edit', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {

        $user        = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = Profile::where('user_id', '=', $user->id)->get()->first();
        $profile->code = $request->code;
        $profile->surname = $request->surname;
        $profile->phone = $request->phone;
        $profile->profile = $request->profile;
        $profile->save();
         
         return redirect()->route('user')->with('message','User actualizado com sucesso!');
    }
}
