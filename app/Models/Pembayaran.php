<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;

class Pembayaran extends Model
{
    protected $table = 'invoices';

    protected $guarded = [
        
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('d F Y');
    }

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

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id', 'order_no_po');
    }
}
 