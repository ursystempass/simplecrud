<?php

namespace App\Http\Controllers;

use App\Models\Stok_Keluar;
use Illuminate\Http\Request;

class stok_keluarController extends Controller
{
    public function index()
    {
     $stok_keluar = stok_keluar::all();
     return view('stok_keluar.index', [
     'stok_keluar' => $stok_keluar
     ]);
    }

    public function create()
    { 
    //Menampilkan Form Tambah Stok
    return view('stok_keluar.create');
    } 

    public function store(Request $request)
    { 
        //Menyimpan Data stok_keluar Baru
        $request->validate([
        'nonota_keluar' => 'required', 
        'tgl_keluar' => 'required', 
        'total_keluar' => 'required', 
        // 'nama_barang' => 'required',
        ]);
        $array = $request->only([
        'nonota_keluar', 'tgl_keluar', 'total_keluar',
        ]);
        $stok_keluar = stok_keluar::create($array);
        return redirect()->route('stok_keluar.index') 
        ->with('success_message', 'Berhasil menambah stok_keluar baru');
        }
        public function edit($id)
        { 
           //Menampilkan Form Edit
           $stok_keluar = stok_keluar::find($id);
           if (!$stok_keluar) return redirect()->route('stok_keluar.index')->with('error_message', 'stok_keluar dengan id'.$id.' tidak ditemukan');
           return view('stok_keluar.edit', [ 
                'stok_keluar' => $stok_keluar
           ]);
       
           }
       
           /**
            * Update the specified resource in storage.
            * 
            * @param \Illuminate\Http\Request $request
            * @param int $id
            * @return \Illuminate\Http\Response
            */
           public function update(Request $request, $id)
           { 
               //Mengedit Data stok_keluar
               $request->validate([
                'nonota_keluar' => 'required', 
                'tgl_keluar' => 'required', 
                'total_keluar' => 'required',
                // 'nama_barang' => 'required',
           ]);
           $stok_keluar = stok_keluar::find($id);
           $stok_keluar->nonota_keluar = $request->nonota_keluar;
           $stok_keluar->tgl_keluar = $request->tgl_keluar;
           $stok_keluar->total_keluar = $request->total_keluar;
        //    $stok_keluar->nama_barang = $request->nama_barang;
           return redirect()->route('stok_keluar.index')->with('success_message', 'Berhasil mengubah stok_keluar');
           }
       
           /**
            * Remove the specified resource from storage.
            * 
            *  @param int $id
            * @return \Illuminate\Http\Response
            */
           public function destroy(Request $request, $id)
           {
               //Menghapus User
               $stok_keluar = stok_keluar::find($id);
       
               if ($stok_keluar) $stok_keluar->delete();
       
               return redirect()->route('stok_keluar.index')->with('success_message', 'Berhasil menghapus stok_keluar');
           }
       }