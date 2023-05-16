<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchases;
use App\Models\Tickets;

class PurchaseController extends Controller
{
    //Muestra todos los usuarios
    public function index(){
        $users = User::all()->toArray();
        return $users;
    }

    //Inserta las entradas al carrito
    public function insertarEntrada(Request $request)
    {

        $ticket = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price
        ];

        session()->push('cart', $ticket);

        $response = [
            'success' => true
        ];

        return response()->json($response);

    }

    //Muestra las entradas en el carrito
    public function mostrarEntrada()
    {
        $cart = session()->get('cart', []);

        return response()->json($cart);
    }

    //Guardar carrito // Intento de guardar tabla NM
    public function store(Request $request)
    {
        $purchase = new Purchases();
        $purchase->user_id = $request->user_id;
        $purchase->total_price = $request->total_price;
        $tickets = $request->input('tickets', []);
        $purchase->tickets()->attach($tickets);
        $purchase->save();



        $response = [
            'success' => true
        ];

        return response()->json($response);
    }



}
