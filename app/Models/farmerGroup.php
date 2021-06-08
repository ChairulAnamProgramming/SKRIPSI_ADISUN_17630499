<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farmerGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'name',
        'address',
    ];

    public function farmer()
    {
        return $this->hasOne(Farmer::class, 'id', 'farmer_id');
    }

    public function farmers()
    {
        return $this->belongsToMany(Farmer::class);
    }
}
