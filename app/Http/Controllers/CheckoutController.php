<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Show checkout page
    public function index(Request $request)
    {
        // Get cake details from query params
        $cake = [
            'name' => $request->query('name'),
            'pounds' => $request->query('pounds'),
            'quantity' => $request->query('quantity'),
            'price' => $request->query('price'),
            'total' => $request->query('total'),
            'instructions' => $request->query('instructions'),

        ];

        // Return checkout view
        return view('checkout', compact('cake'));
    }

    // Store order (after form submit)
    public function store(Request $request)
    {
        // Retrieve all order details
        $order = [
            'name' => $request->input('cake_name'),
            'pounds' => $request->input('pounds'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'total' => $request->input('total'),
            'instructions' => $request->input('instructions'),
            'customer_name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ];

        // Normally, you would save $order to database here

        return redirect('/')
            ->with('success', '🎉 Your order has been placed successfully!');
    }

}
