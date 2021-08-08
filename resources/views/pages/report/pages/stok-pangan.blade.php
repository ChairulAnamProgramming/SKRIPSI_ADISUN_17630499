@extends('templates.print')

@section('content')

<table class="table table-bordered" style="width: 100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Title Pangan</td>
            <td>Nama Lumbung</td>
            <td>Kategori</td>
            <td>Stok</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Gambar</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($foodItems as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->barn->name}}</td>
            <td class="text-center">
                <img src="{{url('public/storage').'/'.$item->food_category->image}}"
                    alt="{{$item->food_category->name}}" class="img-fluid" width="50">
                <span>{{$item->food_category->name}}</span>
            </td>
            <td>{{$item->stock}}</td>
            <td>{{$item->description}}</td>
            <td>Rp.{{number_format($item->price,2,',','.')}}</td>
            <td><img src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->title}}" class="img-fluid rounded"
                    width="50"></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection