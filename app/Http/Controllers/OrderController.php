<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'cake_id' => 'required|integer',
            'cake_name' => 'required|string',
            'pounds' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'customer_name' => 'required|string|max:191',
            'phone' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        // Save order
        $order = Order::create($data);

        // Optionally: send an email here (example commented)
        // \Mail::to('you@yourdomain.com')->send(new \App\Mail\OrderReceived($order));

        return redirect()->route('cakes.show', $data['cake_id'])
            ->with('success', 'Thank you — your order was received!');
    }
}
