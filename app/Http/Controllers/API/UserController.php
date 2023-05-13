<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller{

    public function index(){
        $users = User::all()->toArray();
        return $users;
    }
    public function login(Request $request){


        $credentials=[
            'email' => $request->email,
            'password' => $request->password
        ];


        if (Auth::attempt($credentials)) {
            $success = true;
            $message = "Usuario logeado correctamente";
        }else {
            $success = false;
            $message = "Usuario no autorizado";
        }
        $response = [
            'success' => $success,
            'message' => $message,
            'login' => Auth::check(),
            'user' => Auth::user()
        ];

        return response()->json($response);
    }

    public function register(Request $request){

        try{
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();
            $user->roles()->attach(3);

            $success = true;
            $message = "Usuario registrado correctamente";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }



        $response=[
            'success' => $success,
            'message' => $message,
        ];


            return response()->json($response);
    }

    public function logout(){
        try{
            Session::flush();

            $success = true;
            $message = "Logout correcto";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response=[
            'success' => $success,
            'message' => $message,
        ];


        return response()->json($response);
    }


    public function add(Request $request){

        try{
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();
            $user->roles()->attach(3);
            $roles = $request->input('roles', []);
            $user->roles()->attach($roles);
            $success = true;
            $message = "Usuario registrado correctamente";
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        $response=[
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }

    public function edit($id)
    {
        $users = User::find($id);
        return response()->json($users);
    }


    public function update($id, Request $request)
    {
        $users = User::find($id);
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'phone'=> 'required'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $users->update($input);

        $users->roles()->sync($request->roles);
        $users->roles()->attach('3');

        return response()->json(['success'=> 'Post update successfully']);
    }


    public function delete($id)
    {
        var_dump($id);
        $tickets = User::find($id);
        $tickets->delete();
        return response()->json(['success'=> 'Post deleted successfully']);


    }
}


