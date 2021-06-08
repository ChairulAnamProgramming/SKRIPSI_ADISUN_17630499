<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'address',
        'phone',
        'place_of_birth',
        'date_of_birth',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function farmer_group()
    {
        return $this->belongsTo(farmerGroup::class, 'farmer_id', 'id');
    }

    public function barn()
    {
        return $this->belongsTo(Barn::class, 'farmer_id', 'id');
    }
}
