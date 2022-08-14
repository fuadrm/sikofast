<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;
use App\Models\Pemesanan;
use App\Models\BahanBaku;

class ProgresController extends Controller
{
    
    public function index()
    {
        // Pembaaran::all();
        $order = Pemesanan::all();
        $bahnabaku = BahanBaku::all();
        return view('/progres/index', [
            "title" => "Pemenuhan Bahan Baku",
            // 'invoice' => Pembayaran::orderBy('id','DESC')->get(),
            // 'produksi' => Produksi::paginate(5)->withQueryString(),
            'order' => Pemesanan::paginate(5)
            // 'pembayaran' => Pembayaran::all()
            
        ]);
    }
}
