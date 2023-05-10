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


    //Panel admin/moderator
    public function panel(){
        $roles = User::with('roles')->get();
        return response()->json($roles);
    }

    public function add(Request $request){

        $request->validate([

            'email'=> 'required',
            'name'=> 'required',
            'surname'=> 'required',
            'password'=> 'required',
            'phone'=> 'required'

        ]);

        $input = $request->all();

        $input['role_id'] = $request->input('role_id');

        User::create($input);

        return response()->json(['success'=>'Post creado correctamente!']);

    }

    /*
    public function edit($id)
    {
        $tickets = Tickets::find($id);
        return response()->json($tickets);
    }


    public function update($id, Request $request)
    {
        $tickets = Tickets::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'id_categorie' => 'required',
            'price' => 'required',
            'file'=> 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'

        ]);

        $input = $request->all();
        $imageName = NULL;
        if ($image = $request->file('file')) {
            $destinationPath = 'img/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
            unlink('img/'.$tickets->image);
        }
        $tickets->update($input);


        return response()->json(['success'=> 'Post update successfully']);
    }
    */


    public function delete($id)
    {
        var_dump($id);
        $tickets = User::find($id);
        $tickets->delete();
        return response()->json(['success'=> 'Post deleted successfully']);


    }
}


