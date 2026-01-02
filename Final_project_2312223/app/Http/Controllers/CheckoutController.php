<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Order;
    use App\Models\OrderItem;

    class CheckoutController extends Controller
    {
        // Show Checkout Page
        public function index()
        {
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
            }

            // Calculate total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            return view('checkout', compact('cart', 'total')); // pass $total to view
        }


        // Place Order
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',

            ]);

            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->route('cart.view')->with('error', 'Cart is empty.');
            }

            // Calculate total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Create Order
            $order = new Order();
            $order->customer_name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->total = $total;
            $order->status = 'pending';
            $order->save();


            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'cake_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['quantity'] * $item['price'],
                ]);
            }

    // ✅ ADD THIS
            session()->put('last_order', [
                'customer_name' => $request->name,
                'address' => $request->address,
                'instructions' => $request->instructions,
                'total' => $total,
                'items' => array_map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'pounds' => $item['pounds'] ?? 1,
                        'quantity' => $item['quantity'],
                        'total' => $item['quantity'] * $item['price'],
                    ];
                }, $cart),
            ]);

    // Clear cart
            session()->forget('cart');

            return redirect('/checkout-success')->with('success', 'Order placed successfully!');

        }
            // Order Success Page
        public function success()
        {
            $order = session('last_order');

            if (!$order) {
                return redirect('/');
            }

            return view('thankyou', compact('order'));
        }


    }
