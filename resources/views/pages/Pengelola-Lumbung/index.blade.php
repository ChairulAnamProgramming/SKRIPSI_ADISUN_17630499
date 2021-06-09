@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Opsi</td>
                                <td>Nama Pengelola</td>
                                <td>Alamat</td>
                                <td>Jumlah Stok</td>
                                <td>Jumlah Anggota</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barns as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-light  btn-sm text-danger btn-icon icon-left">
                                            <i class="fas fa-trash fa-f"></i>
                                            Hapus
                                        </button>
                                        <button class="btn btn-light btn-sm text-warning btn-icon icon-left">
                                            <i class="fas fa-edit fa-fw"></i>
                                            Edit
                                        </button>
                                    </div>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a href="">{{$item->food_items->count()}}</a>
                                </td>
                                <td>
                                    <a href="">{{$item->farmer_group->farmers->count()}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection