<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function insertarEntrada(Request $request)
    {
        //EDITAR
        $tickets = Tickets::all()->toArray();
        session();

        $response=[
            'success' => $request->id
        ];
        //return $tickets;
        return response()->json($response);

    }

    public function guardarEntrada(Request $request)
    {

    }

    public function mostrarEntrada()
    {
//
    }

}
