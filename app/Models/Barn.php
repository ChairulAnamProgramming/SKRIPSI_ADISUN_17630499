<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'farmer_id',
    ];


    public function farmer()
    {
        return $this->hasOne(Farmer::class, 'id', 'farmer_id');
    }

    public function farmers()
    {
        return $this->belongsToMany(Farmer::class);
    }

    public function food_item()
    {
        return $this->hasOne(FoodItem::class, 'farmer_id', 'id');
    }
}
