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
            'id_categorie'=> 'required',
            'price'=> 'required',
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

        $input['id_categorie'] = $request->input('id_categorie');

        Tickets::create($input);

        return response()->json(['success'=>'Post creado correctamente!']);

    }

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


    public function delete($id)
    {
        var_dump($id);
        $tickets = Tickets::find($id);
        $tickets->delete();
        unlink('img/'.$tickets->image);
        return response()->json(['success'=> 'Post deleted successfully']);


    }


}
