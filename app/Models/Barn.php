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
        'farmer_group_id',
    ];


    public function farmer_group()
    {
        return $this->hasOne(farmerGroup::class, 'id', 'farmer_group_id');
    }

    // public function farmers()
    // {
    //     return $this->belongsToMany(Farmer::class);
    // }

    public function food_item()
    {
        return $this->hasOne(FoodItem::class, 'farmer_id', 'id');
    }
}
