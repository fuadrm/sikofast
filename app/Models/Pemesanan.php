<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;

class Pemesanan extends Model
{
    protected $table = 'orders';

    protected $guarded = [
        
    ];

    public function getStartedAtAttribute()
    {
        return Carbon::parse($this->attributes['started_at'])
        ->translatedFormat('d F Y');
    }

    public function getFinishedAtAttribute()
    {
        return Carbon::parse($this->attributes['finished_at'])
        ->translatedFormat('d F Y');
    }

    public function tipe()
    {
        return $this->hasOne(Tipe::class, 'id', 'serv_service_name');
    }

    public function bahan()
    {
                                //id=tbl bahan : material_name=tbl orders
        return $this->hasOne(Bahan::class,'id', 'mat_material_name');
    }

    public function bahanbaku()
    {
        return $this->hasOne(BahanBaku::class, 'id', 'bahanbaku_id');
    }

    
}
