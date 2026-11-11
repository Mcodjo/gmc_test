<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $subtotal = $product->price * $item['quantity'];
                $total += $subtotal;
                $items[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'subtotal' => $subtotal,
                ];
            }
        }

        return view('pages.cart', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:10',
        ]);

        $cart = session('cart', []);
        $productId = $request->product_id;
        $qty = $request->quantity ?? 1;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $qty;
        } else {
            $cart[$productId] = ['quantity' => $qty];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required']);

        $cart = session('cart', []);
        unset($cart[$request->product_id]);
        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé.');
    }
}
