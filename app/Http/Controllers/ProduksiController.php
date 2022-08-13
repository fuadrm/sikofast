<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\MOdels\Produksi;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\BahanBaku;

class ProduksiController extends Controller
{
    
    public function index(Request $request)
    {
        $bahanbaku = BahanBaku::where('status_bb', '1')->get();

        $invoice = Pembayaran::all();
        $order = Pemesanan::all();
        if(in_array(auth()->user()->role,[1,2,3,4])){

        

        if($request->has('search')){
        return view('/produksi/produksi', [
            "title" => "Progres Produksi",
            'invoice' => Pembayaran::where('no_inv', 'like', '%' . $request->search. '%')->where('status','1')
            ->paginate(5)->withQueryString()
            // 'pembayaran' => Pembayaran::all()
            
        ]);
        }else{
            return view('/produksi/produksi', [
                "title" => "Progres Produksi",
                'invoice' => Pembayaran::paginate(5)
                // 'pembayaran' => Pembayaran::all()
                
            ]);
        }

        

        }else{
            return redirect('/produksi/produksi');
        }
    }

    public function update_status(Request $request)
    {
        $model = Pemesanan::find($request->id);
        $model->status_order=$request->status_order;
        $model->save();

        return redirect()->route('produksi')->with('pesan','Status berhasil di Ubah');
    }
}
