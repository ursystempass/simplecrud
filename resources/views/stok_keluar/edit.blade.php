@extends('adminlte::page')
@section('title', 'Tambah Stok')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Stok</h1>
@stop
@section('content')
<form action="{{route('stok_keluar.update', $stok_keluar)}}" method="post">
@method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nonota_keluar">Nota Keluar</label>
                        <input type="text" class="form-control 
@error('nonota_keluar') is-invalid @enderror" id="nonota_keluar" placeholder="nonota_keluar" name="nonota_keluar"
value="{{$stok_keluar->nonota_keluar ??old('nonota_keluar')}}">
                        @error('nonota_keluar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_keluar">Tanggal Keluar</label>
                        <input type="date" class="form-control 
@error('tgl_keluar') is-invalid @enderror" id="tgl_keluar" placeholder="Masukkan Tanggal Keluar" name="tgl_keluar"
value="{{old('tgl_keluar')}}">
                        @error('tgl_keluar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_keluar">Total Keluar</label>
                        <input type="total_keluar" class="form-control 
@error('total_keluar') is-invalid @enderror" id="total_keluar" placeholder="total_keluar" name="total_keluar" value="{{$stok_keluar->total_keluar ??old('total_keluar')}}">
                        @error('total_keluar') <span class="text-danger">{{$message}}</span> @enderror
</div>
<div class="form-group">
                        <!-- <label for="nama_barang">Nama Barang</label>
                        <input type="nama_barang" class="form-control 
@error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="nama_barang" name="nama_barang" value="{{$stok_keluar->nama_barang ??old('nama_barang')}}">
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
</div> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                    <a href="{{route('stok_keluar.index')}}" class="btn btn-outline-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop