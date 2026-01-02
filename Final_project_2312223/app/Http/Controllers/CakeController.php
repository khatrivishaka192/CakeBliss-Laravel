<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;

class CakeController extends Controller
{

    public function index($category = null)
    {
        $query = Cake::query();

        $validCategories = ['regular', 'customized', 'wedding'];

        if (in_array($category, $validCategories)) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', 'LIKE', "%$category%");
            });
        }

        $cakes = $query->get();

        return view('cakes.index', compact('cakes', 'category'));
    }

    // Search cakes
    public function ajaxSearch(Request $request)
    {
        $query = $request->query('query');
        $cakes = Cake::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($cakes);
    }
    public function search(Request $request)
    {
        $query = $request->query('query');
        $cakes = Cake::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        return view('cakes.index', compact('cakes'));
    }
    public function show($id)
    {
        $cake = Cake::findOrFail($id);
        return view('cakes.show', compact('cake'));
    }
    // Add to cart
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $request->name,
                'price' => $request->price,
                'pounds' => $request->pounds,
                'quantity' => $request->quantity,
                'instructions' => $request->instructions,
                'image' => $request->image,
                'total' => $request->price * $request->pounds * $request->quantity,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
}
