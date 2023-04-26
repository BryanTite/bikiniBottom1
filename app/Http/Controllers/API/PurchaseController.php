<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tickets;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function addProduct($product_id)
    {
        //Obtener el producto desde la base de datos
        $product = Tickets::find($product_id);

        //Obtener el carrito de la sesión
        $cart = Session::get('cart', []);

        //Agregar el producto al carrito
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];

        //Guardar el carrito en la sesión
        Session::put('cart', $cart);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function showCart()
    {
        //Obtener el carrito de la sesión
        $cart = Session::get('cart', []);

        return response()->json(['cart' => $cart]);
    }
}
