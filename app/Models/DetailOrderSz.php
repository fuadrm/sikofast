<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;

class DetailOrderSz extends Model
{
    protected $table = 'detail_orders_sz';

    protected $guarded = [
        
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //     ->translatedFormat('d F Y');
    // }

    // public function getFinishedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['finished_at'])
    //     ->translatedFormat('d F Y');
    // }

    // public function tipe()
    // {
    //     return $this->hasOne(Tipe::class, 'id', 'service_name');
    // }

    // public function bahan()
    // {
    //                             //id=tbl bahan : material_name=tbl orders
    //     return $this->hasOne(Bahan::class,'id', 'material_name');
    // }

    
}
