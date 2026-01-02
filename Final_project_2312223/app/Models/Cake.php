<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $table = 'cakes';

    protected $fillable = [

        'name',
        'category_id',
        'price',
        'image',
        'description',
        'ingredients',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
