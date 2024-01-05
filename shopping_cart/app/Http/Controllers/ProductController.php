<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ],200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('cart.index', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            //thay doi cart
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartView = view('cart.index', compact('carts'))->render();
            return response()->json([ 'cartView' => $cartView, 'code' => 200], 200);
        }
    }
}
