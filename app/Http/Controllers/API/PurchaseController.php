<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Purchases;
use App\Models\Tickets;

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

    public function store(Request $request)
    {
        $purchase = new Purchases();
        $purchase->user_id = $request->user_id;
        $purchase->total_price = $request->total_price;
        $purchase->save();

        $roles = $request->input('tickets', []);
        $purchase->tickets()->attach($roles);

        $response = [
            'success' => true
        ];

        return response()->json($response);
    }



}
