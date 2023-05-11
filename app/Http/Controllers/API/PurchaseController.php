<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PurchaseController extends Controller
{
    public function index(){
        $users = User::all()->toArray();
        return $users;
    }

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

    public function mostrarEntrada()
    {
        $cart = session()->get('cart', []);

        return response()->json($cart);
    }
    

}
