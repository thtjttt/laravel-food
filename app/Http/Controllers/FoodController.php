<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('products', compact('foods'));
    }

    public function foodCart()
    {
        return view('cart');
    }

    public function addFoodtoCart($id)
    {
        $food = Food::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $food->name,
                "quantity" => 1,
                "price" => $food->price,
                "image" => $food->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Food has been added to cart!');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Food added to cart.');
        }
    }
   
    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Food successfully deleted.');
        }
    }
}

