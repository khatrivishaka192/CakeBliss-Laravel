<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class CartController extends Controller
//{
//    // Show cart items
//    public function index(Request $request)
//    {
//        $cart = session()->get('cart', []);
//        $total = collect($cart)->sum(fn($item) => $item['total']);
//        return view('cart', compact('cart', 'total'));
//    }
//
//    // Add item to cart
//    public function add(Request $request)
//    {
//        $cart = session()->get('cart', []);
//
//        $id = $request->input('id');
//        $name = $request->input('name');
//        $price = $request->input('price');
//        $pounds = $request->input('pounds', 1);
//        $quantity = $request->input('quantity', 1);
//        $instructions = $request->input('instructions', '');
//        $image = $request->input('image');
//
//        $total = $price * $pounds * $quantity;
//
//        $cart[$id] = [
//            'id' => $id,
//            'name' => $name,
//            'price' => $price,
//            'pounds' => $pounds,
//            'quantity' => $quantity,
//            'instructions' => $instructions,
//            'total' => $total,
//            'image' => $image,
//        ];
//
//        session()->put('cart', $cart);
//
//        return redirect()->route('cart.index');
//    }
//
//    // Remove a single item
//    public function remove($id)
//    {
//        $cart = session()->get('cart', []);
//        unset($cart[$id]);
//        session()->put('cart', $cart);
//
//        return redirect()->route('cart.index');
//    }
//
//
//}


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['total']);
        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $pounds = $request->input('pounds', 1);
        $quantity = $request->input('quantity', 1);
        
        // Generate a composite key so different pounds don't overwrite each other
        // unique key = cakeID_poundValue (e.g. 5_2 for Cake ID 5, 2 Pounds)
        $cartKey = $id . '_' . $pounds;

        $cart = session()->get('cart', []);

        if (isset($cart[$cartKey])) {
            // Item exists, just increment quantity
            $cart[$cartKey]['quantity'] += $quantity;
            
            // Recalculate total for this line item
            $cart[$cartKey]['total'] = $cart[$cartKey]['price'] * $cart[$cartKey]['quantity'];
            
        } else {
            // New Item - Fetch base price from DB to be safe, or use hidden input but DB is better
            // Since we don't want to query DB every time, we can trust the hidden inputs if we validate
            // But here, let's use the logic: Unit Price = Base Price * Pounds
            
            // We need base price. The form sends 'price' ?? No, we removed 'price' select.
            // Let's assume we can fetch it, or if performance matters rely on hidden field if present.
            // The show.blade.php doesn't have a hidden 'base_price'.
            // Let's fetch the cake.
            $cake = Cake::find($id);
            if(!$cake) return redirect()->back()->with('error', 'Cake not found');

            $unitPrice = $cake->price * $pounds;

            $cart[$cartKey] = [
                'id' => $id, // Real Cake ID
                'key' => $cartKey, // Unique Cart Key
                'name' => $cake->name,
                'price' => $unitPrice, // Price for this specific weight
                'pounds' => $pounds,
                'quantity' => $quantity,
                'instructions' => '',
                'total' => $unitPrice * $quantity,
                'image' => $cake->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Added to cart!');
    }

    public function update(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        
        if (!isset($cart[$key])) return redirect()->route('cart.index');

        if ($request->action == 'increase') {
            $cart[$key]['quantity']++;
        } elseif ($request->action == 'decrease' && $cart[$key]['quantity'] > 1) {
            $cart[$key]['quantity']--;
        }

        // Recalculate total
        $cart[$key]['total'] = $cart[$key]['price'] * $cart[$key]['quantity'];

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
