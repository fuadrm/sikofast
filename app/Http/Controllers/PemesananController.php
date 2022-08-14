<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bahan;
use App\Models\Tipe;
use App\Models\Pemesanan;
use Carbon\Carbon;
use App\Models\DetailOrderSzs;
use App\Models\DetailOrderSzl;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriteXlsx;

class PemesananController extends Controller
{
    public function generateExcel(Request $request) {

        
        $order = Pemesanan::where('status_order','2')->get();

        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load(public_path('template/genExcel/pemesanan.xlsx'));
        $writer = new WriteXlsx($spreadsheet);

        $column = 8;
        $index = 1;
        foreach ($order as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$column, $index)
                ->setCellValue('B'.$column, $value->no_po)
                ->setCellValue('C'.$column, $value->customer)
                ->setCellValue('D'.$column, $value->phone)
                ->setCellValue('E'.$column, $value->started_at)
                ->setCellValue('F'.$column, $value->finished_at)
                ->setCellValue('G'.$column, $value->bahan->material_name)
                ->setCellValue('H'.$column, $value->tipe->service_name)
                ->setCellValue('I'.$column, $value->qty)
                ->setCellValue('J'.$column, $value->total);
            $index++;
            $column++;
        }
        $fileName = 'Export Data Pemesanan - Semua';
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        die();
    }

    public function index(Request $request)
    {
        if(in_array(auth()->user()->role,[1,2,3,4])){

            if($request->has('search')){
            return view('/pemesanan/pemesanan', [
                "title" => "Data Pemesanan",
                
                // 'order' => Pemesanan::orderBy('id','DESC')->paginate(5)->withQueryString()
                'order' => Pemesanan::where('no_po', 'like', '%' . $request->search. '%')
                    ->orWhere('customer', 'like', '%' . $request->search. '%')->paginate(5)->withQueryString()
                
            ]);
            }else {
                return view('/pemesanan/pemesanan', [
                    "title" => "Data Pemesanan",
                    
                    // 'order' => Pemesanan::orderBy('id','DESC')->paginate(5)->withQueryString()
                    'order' => Pemesanan::paginate(5)->withQueryString()
                ]);
            }
        }else{
            return redirect('/pemesanan');
        }
    }
    
    public function add()
    {
        $now = Carbon::now();
        $tgl = $now->day;  
        $bln = $now->month; 
        $thn = $now->year;
        $cek = Pemesanan::count();
        if ($cek == 0){
            $urut = 1;
            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT);
            $no_po = 'FP-PO/' . $tgl .'/'. $bln . '/' . $thn . '/'. $urut;
        } else {
            $ambil = Pemesanan::all()->last();
            $urut = $ambil->id +1;
            $urut = str_pad($urut, 3, '0', STR_PAD_LEFT);
            $no_po = 'FP-PO/' . $tgl .'/'. $bln . '/' . $thn . '/'. $urut;
        }
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $doszs = DetailOrderSzs::all();
        $doszl = DetailOrderSzl::all();

        if(in_array(auth()->user()->role,[1,2])){
        return view('/pemesanan/f_pemesanan', [
            "title" => "Input Formulir Pemesanan",
            'bahan' => $bahan,
            'tipe' => $tipe,
            'doszs' => $doszs,
            'doszl' => $doszl,
            'no_po' => $no_po
        ]);
        }else{
            return redirect('/pemesanan');
        }
    }

    public function insert()
    {
        
        Request()->validate([
            'customer'=>'required',
            // 'no_po'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'started_at'=>'required',
            'finished_at'=>'required',
            'qty'=>'required',
            'design'=>'required|mimes:jpg,jpeg,png|max:10000',
            
        ],[
            'customer.required' => 'Wajib diisi',
            // 'no_po.required' => ' Wajib diisi',
            'phone.required'=>'Wajib diisi',
            'address.required'=>'Wajib diisi',
            'started_at.required' => 'Wajib diisi',
            'finished_at.required' => 'Wajib diisi',
            'qty.required' => 'Wajib diisi',
            'design.required' => 'Wajib diisi',
            'design.mimes' => 'format file; jpg,jpeg,png',
            'design.max' => 'File Anda Terlalu Besar',

            
        ]);

        
        //upload gambar
        $file = Request()->design;
        $fileName = str_replace('/','-',Request()->no_po).'.'.$file->extension();
        $file->move(public_path('design'), $fileName);


        
        $order = [
            'customer'=>Request()->customer,
            'no_po'=>Request()->no_po,
            'started_at'=>Request()->started_at,
            'finished_at'=>Request()->finished_at,
            'qty'=>Request()->qty,
            'design'=> $fileName,
            'caption'=>Request()->caption,
            'add_detail'=>Request()->add_detail,
            'mat_material_name'=>Request()->mat_material_name,
            'serv_service_name'=>Request()->serv_service_name,
            'team'=>Request()->team,
            'phone'=>Request()->phone,
            'address'=>Request()->address,
            'total'=>Request()->total
            
        ];

       

        $pesan = Pemesanan::create($order);

        $doszs = [
            'order_id'=>$pesan->id,
            'szs_s'=>Request()->szs_s,
            'szs_m'=>Request()->szs_m,
            'szs_l'=>Request()->szs_l,
            'szs_xl'=>Request()->szs_xl,
            'szs_2xl'=>Request()->szs_2xl,
            'szs_3xl'=>Request()->szs_3xl,
            'szs_4xl'=>Request()->szs_4xl,
        ];

        $doszl = [
            'order_id'=>$pesan->id,
            'szl_s'=>Request()->szl_s,
            'szl_m'=>Request()->szl_m,
            'szl_l'=>Request()->szl_l,
            'szl_xl'=>Request()->szl_xl,
            'szl_2xl'=>Request()->szl_2xl,
            'szl_3xl'=>Request()->szl_3xl,
            'szl_4xl'=>Request()->szl_4xl,
        ];

        DetailOrderSzs::insert($doszs);
        DetailOrderSzl::insert($doszl);
        return redirect()->route('pemesanan')->with('pesan','Data Berhasil diTambahkan');
    }

    public function edit($id)
    {
        
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::where('id',$id)->first();
        $doszs = DetailOrderSzs::where('order_id',$id)->first();
        $doszl = DetailOrderSzl::where('order_id',$id)->first();
        if(in_array(auth()->user()->role,[1,2])){
        return view('/pemesanan/edit_pemesanan', [
            "title" => "Edit Formulir Pemesanan",
            
            'bahan' => $bahan,
            'tipe' => $tipe,
            'order' => $order,
            'doszs' => $doszs,
            'doszl' => $doszl
        ]);
        }else{
            return redirect('/pemesanan');
        }
    }

    public function update($id)
    {
        Request()->validate([
            'customer'=>'required',
            
            'qty'=>'required',
           
            
        ],[
            'customer.required' => 'Wajib diisi',
            
            'qty.required' => 'Wajib diisi',

            
        ]);

        
        //upload gambar
        // $file = Request()->design;
        // $fileName = Request()->no_po.'.'.$file->extension();
        // $file->move(public_path('design'), $fileName);


        
        $order = [
            'customer'=>Request()->customer,
            
            'caption'=>Request()->caption,
            'add_detail'=>Request()->add_detail,
            
            'team'=>Request()->team,
            'phone'=>Request()->phone,
        ];


        $pesan = Pemesanan::where('id', $id)
            ->update($order);

            $doszs = [
                // 'order_id'=>$pesan->id,
                'szs_s'=>Request()->szs_s,
                'szs_m'=>Request()->szs_m,
                'szs_l'=>Request()->szs_l,
                'szs_xl'=>Request()->szs_xl,
                'szs_2xl'=>Request()->szs_2xl,
                'szs_3xl'=>Request()->szs_3xl,
                'szs_4xl'=>Request()->szs_4xl,
            ];
    
            $doszl = [
                // 'order_id'=>$pesan->id,
                'szl_s'=>Request()->szl_s,
                'szl_m'=>Request()->szl_m,
                'szl_l'=>Request()->szl_l,
                'szl_xl'=>Request()->szl_xl,
                'szl_2xl'=>Request()->szl_2xl,
                'szl_3xl'=>Request()->szl_3xl,
                'szl_4xl'=>Request()->szl_4xl,
            ];
    
            DetailOrderSzs::where('id', $id)
                ->update($doszs);

        return redirect()->route('pemesanan')->with('pesan','Data Berhasil diUbah');
    }

    public function detail($id)
    {
        
        $bahan = Bahan::all();
        $tipe = Tipe::all();
        $order = Pemesanan::where('id',$id)->first();
        $doszs = DetailOrderSzs::where('order_id',$id)->first();
        $doszl = DetailOrderSzl::where('order_id',$id)->first();
        return view('/pemesanan/detail_pemesanan', [
            "title" => "Detail Pemesanan",
            'order' => $order,
            'bahan' => $bahan,
            'tipe' => $tipe,
            'doszs' => $doszs,
            'doszl' => $doszl
        ]);
    }

    public function destroy($id)
    {
        Pemesanan::destroy($id);
        if(in_array(auth()->user()->role,[1,2])){
        return redirect()->route('pemesanan')->with('pesan','Data Berhasil diHapus');
        }else{
            return redirect('/pemesanan');
        }
    }
}
