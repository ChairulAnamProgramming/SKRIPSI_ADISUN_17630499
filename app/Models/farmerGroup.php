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

    // Ketua Kelompok Relasi ke Farmer
    public function farmer()
    {
        return $this->hasOne(Farmer::class, 'id', 'farmer_id');
    }

    // Anggota Kelompok Relasi ke Farmer_farmer_group
    public function farmers()
    {
        return $this->belongsToMany(Farmer::class);
    }

    public function barn()
    {
        return $this->belongsTo(Barn::class, 'farmer_group_id', 'id');
    }
}
