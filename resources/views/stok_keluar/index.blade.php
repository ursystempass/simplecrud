@extends('adminlte::page') 
@section('title', 'List Stok Keluar') 
@section('content_header') 
    <h1 class="m-0 text-dark">List Stok Keluar</h1>
@stop
@section('content') 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('stok_keluar.create')}}" class="btn btn-dark">
                        Tambah
                    </a>
                    <div class="table-responsive">
    <table class="table table-responsive table-borderless" id="example2">
                    <thead>
                    <tr class="bg-light">
                    <th scope="col" width="5%">No.</th>
                    <th scope="col" width="5%">Nota Keluar</th>
                    <th scope="col" width="5%">Tanggal Keluar</th>
                    <th scope="col" width="5%">Total Keluar</th>
                    <th scope="col" width="5%">Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stok_keluar as $key => $stok_keluar)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$stok_keluar->nonota_keluar}}</td>
                                <td>{{$stok_keluar->tgl_keluar}}</td>
                                <td>{{$stok_keluar->total_keluar}}</td>
                                <!-- <td>{{$stok_keluar->nama_barang}}</td> -->
                                <td>
                                <a href="{{route('stok_keluar.edit', 
$stok_keluar)}}" class="btn btn-outline-secondary btn-sm">
                                    Edit
                                </a>
                                <a href="{{route('stok_keluar.destroy', 
$stok_keluar)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-sm">
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