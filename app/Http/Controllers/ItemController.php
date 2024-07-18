<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    //
    public function addToCart(Request $request, $item_id){
        $cartItem = Order::where('user_id', Auth::user()->id)
                        ->where('item_id', $item_id)
                        ->first();

        if($cartItem != NULL){
            Session::put(['Page' => 'NotAddCart']);
            return redirect('/alert');
        }

        $item = Item::where('item_id', $item_id)->first();

        $cartItem = new Order();
        $cartItem->user_id = Auth::user()->id;
        $cartItem->item_id = $item_id;
        $cartItem->price = $item->price;

        $cartItem->save();
        Session::put(['Page' => 'AddCart']);
        return redirect('/alert');
    }

    public function deleteFromCart($item_id){
        $cartItem = Order::where('item_id', $item_id)
                        ->first();
        $cartItem->delete();

        Session::put(['Page' => 'DeleteCart']);
        return redirect('/alert');
    }

    public function checkout(){
        $cartItem = Order::all();

        foreach($cartItem as $cart){
            $cart->delete();
        }

        Session::put(['Page' => 'Checkout']);
        return redirect('/alert');
    }
}
