<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'products';

    protected $guarded = [
        
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //     ->translatedFormat('d F Y');
    // }

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id', 'no_po');
    }

    public function bahanbaku()
    {
        return $this->hasOne(BahanBaku::class, 'id', 'status');
    }
}
