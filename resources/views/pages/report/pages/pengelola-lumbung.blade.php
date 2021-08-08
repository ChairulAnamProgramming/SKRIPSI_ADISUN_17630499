@extends('templates.print')

@section('content')
<table class="table table-bordered" width="100%">
    <thead>
        <tr>
            <td>No</td>
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
@endsection