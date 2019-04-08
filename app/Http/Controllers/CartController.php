<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Cart;


class CartController extends Controller
{   
    public function addCart($id)
    {     
        $food = Food::findOrFail($id);
        if($food->promotion != null)
        {
            $foodPrice = $food->price - ($food->price * $food->promotion->discount) / 100;
        } else {
            $foodPrice = $food->price;
        }
        Cart::add([
            'id' => $food->id,
            'name' => $food->name,
            'price' => $foodPrice,
            'qty' => $food->quantity = 1,
            'options' => ['image' => $food->image],
        ]);

        return redirect()->back();
    }

    public function listCart()
    {
        $cartFood = Cart::content();

        return view('front.pages.cart', compact('cartFood'));
    }

    public function deleteCart($id)
    {   
        $food = Food::find($id);
        if ($id == 'all')
        {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }        

        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }
}

