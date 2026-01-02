<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
    protected $fillable = [
        'order_id',
        'cake_name',
        'quantity',
        'price',
        'subtotal',
    ];


    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function cake() {
        return $this->belongsTo(Cake::class);
    }
}
