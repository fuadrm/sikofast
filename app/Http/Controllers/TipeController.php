<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipe;

class TipeController extends Controller
{
    public function index(Request $request)
    {
        if(in_array(auth()->user()->role,[1])){

        if($request->has('search')){
        return view('/tipe/tipe_order', [
        "title" => "Data Jasa Servis",
        // 'tipe' => Tipe::all()
        'tipe' => Tipe::where('service_name', 'like', '%' . $request->search. '%')
        ->orWhere('price', 'like', '%' . $request->search. '%')->paginate(5)->withQueryString()
        
        ]);
        }else {
            return view('/tipe/tipe_order', [
            
                "title" => "Data Jasa Servis",
                // 'tipe' => Tipe::all()
                'tipe' => Tipe::paginate(5)->withQueryString()
            ]);
        }

        }else{
            return redirect('tipe_order');
        }
    }
    
    public function add()
    {
        if(in_array(auth()->user()->role,[1])){
        return view('/tipe/f_tipe_order', [
            "title" => "Input Tipe Jasa Servis"
        ]);
        }else{
            return redirect('tipe_order');
        }
    }

    public function insert()
    {
        Request()->validate([
            
            'service_name'=>'required',
            'price_service'=>'required'
        ],[
            
            'service_name.required' => 'Wajib diisi !',
            'price_service.required' => 'Wajib diisi !',
        ]);

        $tipe = [
            
            'service_name' => Request()->service_name,
            'price_service' => Request()->price_service
        ];

        Tipe::insert($tipe);
        return redirect()->route('tipe_order')->with('pesan','Data Berhasil diTambahkan');
    }

    public function edit($id)
    {
        
        $tipe = Tipe::where('id',$id)->first();
        if(in_array(auth()->user()->role,[1])){
        return view('/tipe/edit_tipe_order', [
            "title" => "Edit Tipe Jasa Servis",
            'tipe' => $tipe,
        ]);
        }else{
            return redirect('tipe_order');
        }
    }

    public function update($id)
    {
        Request()->validate([
            
            'service_name'=>'required',
            'price_service'=>'required'
        ],[
            
            'service_name.required' => 'Wajib diisi !',
            'price_service.required' => 'Wajib diisi !',
        ]);

        $tipe = [
            
            'service_name' => Request()->service_name,
            'price_service' => Request()->price_service
        ];

        Tipe::where('id', $id)
            ->update($tipe);
        return redirect()->route('tipe_order')->with('pesan','Data Berhasil diTambahkan');
    }

    public function destroy($id)
    {
        Tipe::destroy($id);
        if(in_array(auth()->user()->role,[1])){
        return redirect()->route('tipe_order')->with('pesan','Data Berhasil diHapus');
        }else{
            return redirect('tipe_order');
        }
    }
}
