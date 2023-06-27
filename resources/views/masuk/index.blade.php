@extends('adminlte::page') 
@section('title', 'List Stok Masuk') 
@section('content_header') 
    <h1 class="m-0 text-dark">List Stok Masuk</h1>
@stop
@section('content') 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('masuk.create')}}" class="btn btn-dark">
                        Tambah
                    </a>
                    <div class="table-responsive">
    <table class="table table-responsive table-borderless" id="example2">
                    <thead>
                    <tr class="bg-light">
                    <th scope="col" width="5%">No.</th>
                    <th scope="col" width="5%">Stok</th>
                    <th scope="col" width="5%">Jumlah Barang</th>
                    <th scope="col" width="5%">Kategori Barang</th>
                    <th scope="col" width="5%">Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($masuk as $key => $masuk)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$masuk->stok}}</td>
                                <td>{{$masuk->jumlah}}</td>
                                <td>{{$masuk->kategori}}</td>
                                <td>
                                <a href="{{route('masuk.edit', 
$masuk)}}" class="btn btn-outline-secondary btn-sm">
                                    Edit
                                </a>
                                <a href="{{route('masuk.destroy', 
$masuk)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-sm">
                                    Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js') 
<form action="" id="delete-form" method="post"> @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
        function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
            } 
        }
    </script> 
@endpush