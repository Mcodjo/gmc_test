<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $id => $item) {
            $product = \App\Models\Product::find($id);
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

        return view('pages.checkout', compact('items', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Commande confirmée ! Vous recevrez un email de confirmation.');
    }
}
