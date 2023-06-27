@extends('adminlte::page')
@section('title', 'Edit Tambah Stok')
@section('content_header')
<h1 class="m-0 text-dark">Edit Tambah Stok</h1>
@stop
@section('content')
<form action="{{route('masuk.update', $masuk)}}" method="post">
@method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input type="number" class="form-control 
@error('stok') is-invalid @enderror" id="stok" placeholder="Stok Barang" name="stok"
value="{{$masuk->stok ?? old('stok')}}">
                        @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="jumlah" class="form-control 
@error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukkan Jumlah Barang" name="jumlah"
value="{{$masuk->jumlah ?? old('jumlah')}}">
                        @error('jumlah') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori Barang</label>
                        <input type="kategori" class="form-control 
@error('kategori') is-invalid @enderror" id="kategori" placeholder="kategori" name="kategori"
value="{{$masuk->kategori ?? old('kategori')}}">
                        @error('kategori') <span class="text-danger">{{$message}}</span> @enderror
</div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                    <a href="{{route('masuk.index')}}" class="btn btn-outline-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
