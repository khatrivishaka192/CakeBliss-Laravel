<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Get the cart from session.
     */
    public function getCart()
    {
        return Session::get('cart', []);
    }

    /**
     * Add an item to the cart.
     */
    public function add($data)
    {
        $cart = $this->getCart();
        $id = $data['id'];

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $data['quantity'] ?? 1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $data['name'],
                'price' => (float) $data['price'],
                'image' => $data['image'],
                'pounds' => $data['pounds'] ?? 1,
                'quantity' => $data['quantity'] ?? 1,
                'instructions' => $data['instructions'] ?? '',
            ];
        }

        // Recalculate item total
        $cart[$id]['total'] = $cart[$id]['price'] * $cart[$id]['pounds'] * $cart[$id]['quantity'];

        Session::put('cart', $cart);
        
        return $this->getStats();
    }

    /**
     * Update item quantity.
     * Action: increase, decrease, or set.
     */
    public function update($id, $action)
    {
        $cart = $this->getCart();

        if (!isset($cart[$id])) {
            return false;
        }

        if ($action === 'increase') {
            $cart[$id]['quantity']++;
        } elseif ($action === 'decrease') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        // Recalculate item total
        $cart[$id]['total'] = $cart[$id]['price'] * $cart[$id]['pounds'] * $cart[$id]['quantity'];

        Session::put('cart', $cart);

        return [
            'item_total' => $cart[$id]['total'],
            'cart_stats' => $this->getStats()
        ];
    }

    /**
     * Remove item from cart.
     */
    public function remove($id)
    {
        $cart = $this->getCart();

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return $this->getStats();
    }

    /**
     * Clear the cart.
     */
    public function clear()
    {
        Session::forget('cart');
    }

    /**
     * Get Cart Totals (Count & Grand Total).
     */
    public function getStats()
    {
        $cart = $this->getCart();
        $total = collect($cart)->sum(fn($item) => $item['total']);
        $count = count($cart);

        return [
            'count' => $count,
            'total' => $total,
            'formatted_total' => number_format($total, 0)
        ];
    }
}
