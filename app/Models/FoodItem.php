<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_category_id',
        'barn_id',
        'title',
        'stock',
        'description',
        'price',
        'image',
    ];

    public function food_category()
    {
        return $this->hasOne(FoodCategory::class, 'id', 'food_category_id');
    }

    public function barn()
    {
        return $this->hasOne(Barn::class, 'id', 'barn_id');
    }
}
