<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    public function index()
    {
     $masuk = Masuk::all();
     return view('masuk.index', [
     'masuk' => $masuk
     ]);
    }

    public function create()
    { 
    //Menampilkan Form Tambah Stok
    return view('masuk.create');
    } 

    public function store(Request $request)
    { 
        //Menyimpan Data masuk Baru
        $request->validate([
        'stok' => 'required', 
        'jumlah' => 'required', 
        'kategori' => 'required', 
        ]);
        $array = $request->only([
        'stok', 'jumlah', 'kategori'
        ]);
        $masuk = masuk::create($array);
        return redirect()->route('masuk.index') 
        ->with('success_message', 'Berhasil menambah masuk baru');
        }
        public function edit($id)
        { 
           //Menampilkan Form Edit
           $masuk = masuk::find($id);
           if (!$masuk) return redirect()->route('masuk.index')->with('error_message', 'masuk dengan id'.$id.' tidak ditemukan');
           return view('masuk.edit', [ 
                'masuk' => $masuk
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
               //Mengedit Data masuk
               $request->validate([
                'stok' => 'required', 
                'jumlah' => 'required', 
                'kategori' => 'required'
           ]);
           $masuk = masuk::find($id);
           $masuk->stok = $request->stok;
           $masuk->jumlah = $request->jumlah;
           $masuk->kategori = $request->kategori;
           $masuk->level = $request->level;
           $masuk->aktif = $request->aktif;
           return redirect()->route('masuk.index')->with('success_message', 'Berhasil mengubah masuk');
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
               $masuk = Masuk::find($id);
       
               if ($masuk) $masuk->delete();
       
               return redirect()->route('masuk.index')->with('success_message', 'Berhasil menghapus masuk');
           }
       }
