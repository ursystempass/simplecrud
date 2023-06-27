@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
<h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
<form action="{{route('users.update', $user)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control 
@error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{$user->name ??
old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email
                            address</label>
                        <input type="email" class="form-control 
@error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$user->email ??
old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control 
@error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Konfirmasi
                        Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword"
                        placeholder="Konfirmasi Password" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="exampleInputlevel">Level</label>
                    <select class="form-control @error('level') is-invalid @enderror" id="exampleInputlevel"
                        name="level">
                        <option value="Penyedia" @if($user->level ==
                            'Penyedia' || old('level') == 'Penyedia')selected @endif>Penyedia</option>
                        <option value="Penjual" @if($user->level
                            == 'Penjual' || old('level') == 'Penjual')selected
                            @endif>Penjual</option>
                        <option value="Pengrajin" @if($user->level ==
                            'Pengrajin' || old('level') == 'Pengrajin')selected @endif>Pengrajin</option>
                    </select>
                    @error('level') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputAktif">Aktif</label>
                    <select class="form-control @error('aktif') is-invalid @enderror" id="exampleInputAktif"
                        name="aktif">
                        <option value="1" @if($user->aktif == '1'
                            || old('aktif') == '1')selected @endif>Ya</option>
                        <option value="0" @if($user->aktif == '0' ||
                            old('aktif') == '0')selected @endif>Tidak</option>
                    </select>
                    @error('level') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-outline-danger">
                        Batal
                </a>
            </div>
        </div>
    </div>
    </div>
    @stop
