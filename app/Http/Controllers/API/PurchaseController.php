<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function insertarEntrada(Request $request)
    {

        $ticket = [
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
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
