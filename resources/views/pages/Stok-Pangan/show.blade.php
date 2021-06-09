@extends('templates.index')

@section('content')

<div class="container">
    <div class="card">
        <img class="card-img-top" src="{{url('public/storage').'/'.$foodItem->image}}" alt="{{$foodItem->title}}"
            class="img-fluid" style="height: 400px">
        <div class="card-body">
            <div class="dropdown d-inline">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opsi
                </button>
                <div class="dropdown-menu" x-placement="bottom-start">
                    <a class="dropdown-item has-icon" href="{{route('foodItem.edit',$foodItem->id)}}"><i
                            class="fas fa-edit"></i> Edit</a>
                    <a class="dropdown-item has-icon" href="#"><i class="fas fa-trash"></i> Hapus</a>
                </div>
            </div>
            <br><br>
            <h4 class="card-title">{{$foodItem->title}}</h4>
            <table>
                <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td>{{$foodItem->stock}}</td>
                </tr>
                <tr>
                    <td>Lumbung</td>
                    <td>:</td>
                    <td>{{$foodItem->barn->name}}</td>
                </tr>
                <td>Kategori</td>
                <td>:</td>
                <td><span class="text-success">{{$foodItem->food_category->name}}</span></td>
                </tr>
            </table>
            <br>
            <strong>Deskripsi</strong>
            <p class="card-text">
                {{$foodItem->description}}
            </p>
            <br>
            <h4><strong class="text-primary">Rp.{{number_format($foodItem->price,2,',','.')}}</strong></h4>
        </div>
    </div>
</div>

@endsection