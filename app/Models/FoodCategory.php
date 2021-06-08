<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function food_item()
    {
        return $this->belongsTo(FoodItem::class, 'food_category_id', 'id');
    }
}
