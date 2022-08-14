<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use App\Models\Tipe;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Carbon\Carbon;
use App\Models\DetailOrderSzs;
use App\Models\DetailOrderSzl;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriteXlsx;

class PembayaranController extends Controller
{
    public function generateExcel(Request $request) {

        
        $invoice = Pembayaran::where('status_inv','1')->get();

        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load(public_path('template/genExcel/pembayaran.xlsx'));
        $writer = new WriteXlsx($spreadsheet);

        $column = 8;
        $index = 1;
        foreach ($invoice as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$column, $index)
                ->setCellValue('B'.$column, $value->no_inv)
                ->setCellValue('C'.$column, $value->pemesanan->no_po)
                ->setCellValue('D'.$column, $value->pemesanan->customer)
                ->setCellValue('E'.$column, $value->started_at_inv)
                ->setCellValue('F'.$column, $value->down_payment)
                ->setCellValue('G'.$column, $value->price_invoice)
                ->setCellValue('H'.$column, value:$value->down_payment+$value->price);
            $index++;
            $column++;
        }
        $fileName = 'Export Data Pembayaran - Semua';
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        die();
    }
    
    public function index(Request $request)
    {
        
        if(in_array(auth()->user()->role,[1,2,3])){

        if($request->has('search')){
        return view('/pembayaran/pembayaran', [
            "title" => "Data Pembayaran",
            // 'invoice' => Pembayaran::orderBy('id','DESC')->get(),
            
            'invoice' => Pembayaran::orderBy('id','DESC')->where('no_inv', 'like', '%' . $request->search. '%')
            ->paginate(5)->withQueryString(),
            
        ]);
        }else{
        return view('/pembayaran/pembayaran', [
            "title" => "Data Pembayaran",
            // 'invoice' => Pembayaran::orderBy('id','DESC')->get(),
            
            'invoice' => Pembayaran::orderBy('id','DESC')->paginate(5)->withQueryString(),
        ]);
        }

        }else{
            return redirect('/pembayaran');
        }
    }

   
    public function lunas()
    {
        
        if(in_array(auth()->user()->role,[1,2,3])){
            $invoice =  Pembayaran::where('status_inv','1')->orderBy('id','DESC')->paginate(5)->withQueryString();
            
            
            return view('/pembayaran/lunas', [
                "title" => "Data Pembayaran Lunas",
                // 'invoice' => Pembayaran::orderBy('id','DESC')->get(),
                
                'invoice' => $invoice
                
            ]);

            
        }else{
            return redirect('/pembayaran');
        }
    }

    public function dp()
    {
        
        if(in_array(auth()->user()->role,[1,2,3])){
            
            return view('/pembayaran/dp', [
                "title" => "Data Pembayaran Down Payment",
                // 'invoice' => Pembayaran::orderBy('id','DESC')->get(),
                
                'invoice' => Pembayaran::where('status_inv','0')->orWhere('status_inv',NULL)->orderBy('id','DESC')->paginate(5)->withQueryString(),
                
            ]);
            
        }else{
            return redirect('/pembayaran');
        }
    }

    public function add()
    {
        
        $now = Carbon::now();
        $tgl = $now->day;  
        $bln = $now->month; 
        $thn = $now->year;
        $cek = Pembayaran::count();
        if ($cek == 0){
            $urut = 1;
            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT);
            $no_inv = 'INV-FP/' . $tgl .'/'. $bln . '/' . $thn . '/'. $urut;
        } else {
            $ambil = Pembayaran::all()->last();
            $urut = $ambil->id +1;
            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT);
            $no_inv = 'INV-FP/' . $tgl .'/'. $bln . '/' . $thn . '/'. $urut;
        }

        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::all();
        // $invoice = Pembayaran::where('id',$id)->first();
        if(in_array(auth()->user()->role,[1,3])){
        return view('/pembayaran/f_pembayaran', [
            "title" => "Input Nota Pembayaran",
            'order' => $order,
            'bahan' => $bahan,
            'tipe' => $tipe,
            'no_inv' => $no_inv
            // 'invoice' => $invoice
        ]);
        }else{
            return redirect('/pembayaran');
        }
    }

    public function insert()
    {
        
        Request()->validate([
            'started_at_inv'=>'required',
            'order_no_po' =>'required|unique:invoices'
        ],[
            'started_at_inv.required' => 'Wajib diisi',
            'order_no_po.unique' => 'No Po Sudah digunakan'
        ]);

        $invoice = [
            'down_payment'=>Request()->down_payment,
            'order_no_po'=>Request()->order_no_po,
            'started_at_inv'=>Request()->started_at_inv,
            'no_inv'=>Request()->no_inv,
            // 'price'=>Request()->price
            
        ];

        Pembayaran::insert($invoice);
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil diTambahkan');
    }

    public function detail($id)
    {
        
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::all();
        $invoice = Pembayaran::where('id',$id)->first();
        $doszs = DetailOrderSzs::where('order_id',$id)->first();
        $doszl = DetailOrderSzl::where('order_id',$id)->first();
        return view('/pembayaran/detail_pembayaran', [
            "title" => "Nota Pembayaran",
            'order' => $order,
            'bahan' => $bahan,
            'tipe' => $tipe,
            'invoice' => $invoice,
            'doszs' => $doszs,
            'doszl' => $doszl
        ]);
    }

    public function detail_lunas($id)
    {
        
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::all();
        $invoice = Pembayaran::where('id',$id)->first();
        $doszs = DetailOrderSzs::where('order_id',$invoice->order_no_po)->first();
        $doszl = DetailOrderSzl::where('order_id',$invoice->order_no_po)->first();
        return view('/pembayaran/detail_lunas', [
            "title" => "Nota Pembayaran",
            'order' => $order,
            'bahan' => $bahan,
            'tipe' => $tipe,
            'invoice' => $invoice,
            'doszs' => $doszs,
            'doszl' => $doszl
        ]);
    }

    public function detail_dp($id)
    {
        
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::all();
        $invoice = Pembayaran::where('id',$id)->first();
        $doszs = DetailOrderSzs::where('order_id',$id)->first();
        $doszl = DetailOrderSzl::where('order_id',$id)->first();
        return view('/pembayaran/detail_dp', [
            "title" => "Nota Pembayaran",
            'order' => $order,
            'bahan' => $bahan,
            'tipe' => $tipe,
            'invoice' => $invoice,
            'doszs' => $doszs,
            'doszl' => $doszl
        ]);
    }

    public function edit($id)
    {

        $title = 'Edit Nota';
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::all();
        $invoice = Pembayaran::where('id',$id)->first();
        if(in_array(auth()->user()->role,[1,3])){
        return view('/pembayaran/edit_pembayaran', compact('title', 'bahan', 'tipe', 'order', 'invoice'));
        }else{
            return redirect('/pembayaran');
        }
    }

    public function update(Pembayaran $model)
    {
        // $model->down_payment = request()->down_payment;
        $model->price_invoice = request()->price_invoice;
        
        
        $model->save();
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil diUbah');
    }

    public function destroy($id)
    {
        Pembayaran::destroy($id);
        if(in_array(auth()->user()->role,[1,3])){
        return redirect()->route('pembayaran')->with('pesan','Data Berhasil diHapus');
        }else{
            return redirect('/pembayaran');
        }
    }

    public function status($id)
    {
        $invoice = Pembayaran::where('id',$id)->first();

        $status_now = $invoice->status_inv;

        if($status_now == 1) {
            Pembayaran::where('id', $id) ->update([
                'status_inv' => 0]);
        }else{
            Pembayaran::where('id', $id) ->update([
                'status_inv' => 1]);
        }
        
        return redirect()->route('pembayaran')->with('pesan','Status Berhasil Di Ubah');
    }
}
