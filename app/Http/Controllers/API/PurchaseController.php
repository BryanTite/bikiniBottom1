<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function insertarEntrada(Request $request)
    {
        $user = $request->user();

        $purchase = new Tickets;
        $purchase->user_id = $user->id;
        $purchase->total_price = $request->input('total_price');
        $purchase->date = now();
        $purchase->save();

        return response()->json(['message' => 'Compra realizada con éxito']);
    }

    public function mostrarEntrada()
    {

    }

}
