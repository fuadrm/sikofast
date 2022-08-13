<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Carbon;


class BahanBaku extends Model
{
    protected $table = 'bahanbaku';
    
    protected $guarded = [
        
    ];

    public function getTglBelanjatribute()
    {
        return Carbon::parse($this->attributes['tgl_belanja'])
        ->translatedFormat('d F Y');
    }

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class, 'id', 'order_no_po');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id', 'invoice_no_inv');
    }

    public function status($id)
    {
        $bb = bahanbaku::where('id',$id)->first();

        $status_now = $bb->status;

        if($status_now == 1) {
            bahanbaku::where('id', $id) ->update([
                'status' => 0]);
        }else{
            bahanbaku::where('id', $id) ->update([
                'status' => 1]);
        }
        
        return redirect()->route('bahanbaku')->with('pesan','Status Berhasil Di Ubah');
    }
}
