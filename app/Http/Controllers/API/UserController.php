<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller{
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
        Auth::user()->roles;
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

    public function panel(){
        $roles = User::with('roles')->get();
        return response()->json($roles);
    }
}


