<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriteXlsx;

class BahanBakuController extends Controller
{
    // public function __construct()
    // {
    //     $this->Bahan = new Bahan();
    // }
    public function generateExcel(Request $request) {

        $bahanbaku = BahanBaku::where('status_bb', '1')->get();

        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load(public_path('template/genExcel/bahanbaku.xlsx'));
        $writer = new WriteXlsx($spreadsheet);

        $column = 8;
        $index = 1;
        foreach ($bahanbaku as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$column, $index)
                ->setCellValue('B'.$column, $value->pemesanan->no_po)
                ->setCellValue('C'.$column, $value->bb_name1)
                // ->setCellValue('D'.$column, $value->bb_name2)
                ->setCellValue('D'.$column, $value->tgl_belanja)
                ->setCellValue('E'.$column, $value->total_price);
            $index++;
            $column++;
        }
        $fileName = 'Export Data Pemenuhan BahanBaku - Semua';
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        die();
    }
    
    // public function pemenuhan(Request $request)
    // {
    //     // Pembaaran::all();
    //     $order = Pemesanan::all();
    //     if(in_array(auth()->user()->role,[1,2,3])){

    //     if($request->has('search')){
    //     return view('/bahanbaku/index', [
    //         "title" => "Pemenuhan Bahan Baku",
    //         'order' => Pemesanan::where('no_po', 'like', '%' . $request->search. '%')
    //         ->paginate(5)->withQueryString()
    //         // 'pembayaran' => Pembayaran::all()
            
    //     ]);
    //     }else{
    //         return view('/bahanbaku/index', [
    //             "title" => "Pemenuhan Bahan Baku",
    //             'order' => Pemesanan::paginate(5)
    //             // 'pembayaran' => Pembayaran::all()
                
    //         ]);
    //     }

    //     }else{
    //         return redirect('/bahanbaku/pemenuhan');
    //     }
    // }

    public function pemenuhan(Request $request)
    {
        // $invoice = Pembayaran::where('status', '1')->get();
        $invoice = Pembayaran::all();
        $order = Pemesanan::all();
        if(in_array(auth()->user()->role,[1,2,3,4])){

        

        if($request->has('search')){
        return view('/bahanbaku/index', [
            "title" => "Pemenuhan Bahan Baku",
            'invoice' => Pembayaran::where('no_inv', 'like', '%' . $request->search. '%')
            ->orWhere('no_po', 'like', '%' . $request->search. '%')
            ->paginate(5)->withQueryString()
            // 'pembayaran' => Pembayaran::all()
            
        ]);
        }else{
            return view('/bahanbaku/index', [
                "title" => "Pemenuhan Bahan Baku",
                'invoice' => Pembayaran::paginate(5)
                // 'pembayaran' => Pembayaran::all()
                
            ]);
        }

        

        }else{
            return redirect('/bahanbaku/pemenuhan');
        }
    }
    
    public function index(Request $request)
    {
           
            
            Pemesanan::all();
            if(in_array(auth()->user()->role,[1,3])){
            return view('/bahanbaku/bahanbaku', [
                
                "title" => "Pembelian Bahan Baku Pelanggan",
                
                'bahanbaku' => BahanBaku::paginate(5)->withQueryString()
                
            ]);
            }else{
                return redirect('/bahanbaku/pemenuhan');
            }
    }
    
    public function add()
    {
        $order = Pemesanan::all();
        $invoice = Pembayaran::all();
        if(in_array(auth()->user()->role,[1,3])){
        return view('/bahanbaku/f_bahanbaku', [
            "title" => "Input Bahan Baku",
            'order' => $order,
            'invoice' => $invoice,
            'no_po' => Request()->no_po,
            'no_inv' => Request()->no_inv,
        ]);
        }else{
            return redirect('/bahanbaku/pemenuhan');
        }
    }

    public function insert()
    {
        Request()->validate([
            'tgl_belanja'=>'required',
            'total_price'=>'required',
            'nota'=>'required',
            'order_no_po' =>'required|unique:bahanbaku',
            'invoice_no_inv' =>'required|unique:bahanbaku',
        ],[
            'tgl_belanja.required' => 'Wajib diisi !',
            'total_price.required' => 'Wajib diisi !',
            'nota.required' => 'required|mimes:jpg,jpeg,png|max:1024',
            'order_no_po.unique' => 'No Po sudah digunakan',
            'invoice_no_inv.unique' => 'No Nota sudah digunakan'
        ]);

        
        $file = Request()->nota;
        $fileName = str_replace('/','-',Request()->bahanbaku_name).'.'.$file->extension();
        $file->move(public_path('notabb'), $fileName);

        $bahanbaku = [
            'bb_name1' => Request()->bb_name1,
            'jmlh1' => Request()->jmlh1,
            // 'bb_name2' => Request()->bb_name2,
            // 'jmlh2' => Request()->jmlh2,
            'tgl_belanja'=> Request()->tgl_belanja,
            'nota'=> $fileName,
            'total_price' => Request()->total_price,
            'order_no_po' => Request()->order_no_po,
            'invoice_no_inv' => Request()->invoice_no_inv,
            // 'status_bb'=> Request()->status_bb
        ];

        
        BahanBaku::insert($bahanbaku);
        return redirect()->route('bahanbaku')->with('pesan','Data Berhasil diTambahkan');
    }

    public function edit($id)
    {
        $order = Pemesanan::all();
        
        
        $bahanbaku = BahanBaku::where('id',$id)->first();
        if(in_array(auth()->user()->role,[1,3])){
        return view('/bahanbaku/edit_bahanbaku', [
            "title" => "Edit Bahan Baku",
            'bahanbaku' => $bahanbaku,
            'order' => $order,
            
            
        ]);
        }else{
            return redirect('/bahanbaku');
        }
    }

    public function update($id)
    {
        Request()->validate([
            'tgl_belanja'=>'required',
            'total_price'=>'required',
        ],[
            'tgl_belanja.required' => 'Wajib diisi !',
            'total_price.required' => 'Wajib diisi !',
        ]);

        $bahanbaku = [
            'bb_name1' => Request()->bb_name1,
            'jmlh1' => Request()->jmlh1,
            // 'bb_name2' => Request()->bb_name2,
            // 'jmlh2' => Request()->jmlh2,
            'tgl_belanja'=> Request()->tgl_belanja,
            'total_price' => Request()->total_price,
        ];

        BahanBaku::where('id', $id)
            ->update($bahanbaku);
        return redirect()->route('bahanbaku')->with('pesan','Data Berhasil diUbah');
    }

    public function detail($id)
    {
        
        $bahanbaku = BahanBaku::where('id',$id)->first();
        if(in_array(auth()->user()->role,[1,3])){
        return view('/bahanbaku/detail_bahanbaku', [
            "title" => "Detail Bahan Baku",
            'bahanbaku' => $bahanbaku,
            
        ]);
        }else{
            return redirect('/bahanbaku');
        }
    }

    public function detail_pemenuhan($id)
    {
        
        $bahanbaku = BahanBaku::where('no_po',$id)->first();
        // dd($bahanbaku);
        if(in_array(auth()->user()->role,[1,2,3])){
        return view('/bahanbaku/detail_pemenuhan', [
            "title" => "Detail Pemenuhan Bahan Baku",
            'bahanbaku' => $bahanbaku,
            
        ]);
        }else{
            return redirect('/bahanbaku/pemenuhan');
        }
    }

    public function destroy($id)
    {
        BahanBaku::destroy($id);
        if(in_array(auth()->user()->role,[1,3])){
        return redirect()->route('bahanbaku')->with('pesan','Data Berhasil diHapus');
        }else{
            return redirect('/bahanbaku');
        }
    }

    public function status($id)
    {
        $bb = bahanbaku::where('id',$id)->first();

        $status_now = $bb->status_bb;

        if($status_now == 1) {
            bahanbaku::where('id', $id) ->update([
                'status_bb' => 0]);
        }else{
            bahanbaku::where('id', $id) ->update([
                'status_bb' => 1]);
        }
        
        return redirect()->route('bahanbaku')->with('pesan','Status Berhasil Di Ubah');
    }

}
