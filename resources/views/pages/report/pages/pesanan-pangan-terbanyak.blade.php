@extends('templates.print')

@section('content')


<table class="table table-bordered" style="width: 100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Title Pangan</td>
            <td>Kategori</td>
            <td>Jumlah Pesanan</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($foodItems as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->title}}" class="img-fluid rounded"
                    width="50">
                <small class="d-block">{{$item->title}}</small>
            </td>
            <td class="">
                <img src="{{url('public/storage').'/'.$item->food_category->image}}"
                    alt="{{$item->food_category->name}}" class="img-fluid" width="50">
                <span>{{$item->food_category->name}}</span>
            </td>
            <td>{{$item->carts->count()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection