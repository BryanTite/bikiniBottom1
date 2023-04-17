<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Tickets::all()->toArray();
        return $tickets;
    }

    public function add(Request $request){

        $request->validate([

            'name'=> 'required',
            'description'=> 'required',
            'file'=> 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'

        ]);

        $input = $request->all();
        $imageName = NULL;

        if($image = $request->file('file')){
            $destinationPath = 'img/';
            $imageName = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);

            //Nombre de la base de datos "image"
            $input['image'] = $imageName;
        }

        Tickets::create($input);

        return response()->json(['success'=>'Post creado correctamente!']);

    }

}
