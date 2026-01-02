<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('items')->orderBy('id', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }



    public function show($id)
    {
        // Load order with items and each item's cake
        $order = Order::with('items.cake')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }



    // Update order status
    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    // Delete order
    public function destroy($id) {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
