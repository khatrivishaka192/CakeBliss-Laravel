<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cake_id','cake_name','pounds','quantity','price','customer_name','phone','notes'
    ];
}
