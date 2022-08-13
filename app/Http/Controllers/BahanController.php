<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    // public function __construct()
    // {
    //     $this->Bahan = new Bahan();
    // }
    
    public function index(Request $request)
    {
    
        if($request->has('search')){

        return view('/bahan/bahan', [
            
            "title" => "Data Bahan",
            // 'bahan' => Bahan::all()
            "bahan" => Bahan::where('material_name', 'like', '%' . $request->search. '%')
                ->orWhere('price', 'like', '%' . $request->search. '%')->paginate(5)->withQueryString()
        ]);
        }else {
            return view('/bahan/bahan', [
            
                "title" => "Data Bahan",
                // 'bahan' => Bahan::all()
                "bahan" => Bahan::paginate(5)->withQueryString()
            ]);
        }
    }
    
    public function add()
    {
        if(in_array(auth()->user()->role,[1])){
        return view('/bahan/f_bahan', [
            "title" => "Input Bahan"
        ]);
    }else{
        return redirect('/');
    }
    }

    public function insert()
    {
        Request()->validate([
            'material_name'=>'required',
            'price_material'=>'required'
        ],[
            'material_name.required' => 'Wajib diisi !',
            'price_material.required' => 'Wajib diisi !',
        ]);

        $bahan = [
            'material_name' => Request()->material_name,
            'price_material' => Request()->price_material
        ];

        Bahan::insert($bahan);
        return redirect()->route('bahan')->with('pesan','Data Berhasil diTambahkan');
    }

    public function edit($id)
    {
        if(in_array(auth()->user()->role,[1])){

        $bahan = Bahan::where('id',$id)->first();
        return view('/bahan/edit_bahan', [
            "title" => "Edit Bahan",
            'bahan' => $bahan,
            
        ]);
        
        }else{
            return redirect('/');
        }
    }

    public function update($id)
    {
        Request()->validate([
            // 'code_material'=>'required|unique:materials,code_material|min:6|max:10',
            'material_name'=>'required',
            'price_material'=>'required'
        ],[
            // 'code_material.required' => 'Wajib diisi !',
            // 'code_material.unique' => 'Kode Sudah Terpakai !',
            // 'code_material.min' => 'Minimal 6 Karakter !',
            // 'code_material.max' => 'Maksinal 10 Karakter',
            'material_name.required' => 'Wajib diisi !',
            'price_material.required' => 'Wajib diisi !',
        ]);

        $bahan = [
            // 'code_material' => Request()->code_material,
            'material_name' => Request()->material_name,
            'price_material' => Request()->price_material
        ];

        Bahan::where('id', $id)
            ->update($bahan);
        return redirect()->route('bahan')->with('pesan','Data Berhasil diUbah');
    }

    public function destroy($id)
    {
        if(in_array(auth()->user()->role,[1])){
            
        Bahan::destroy($id);
        return redirect()->route('bahan')->with('pesan','Data Berhasil diHapus');
        
        }else{
            return redirect('/');
        }
    }

}
