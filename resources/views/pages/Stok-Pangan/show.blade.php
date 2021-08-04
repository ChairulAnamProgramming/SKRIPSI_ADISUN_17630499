@extends('templates.index')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-5">
                    <img class="card-img-top" src="{{url('public/storage').'/'.$foodItem->image}}"
                        alt="{{$foodItem->title}}" class="img-fluid" style="height: 400px">
                </div>
                <div class="col-12 col-md-7">
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
                    <h6 class="card-title">{{$foodItem->title}}</h6>
                    <h4><strong class="text-primary">Rp.{{number_format($foodItem->price,2,',','.')}}</strong></h4>
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
                    <strong>Deskripsi</strong>
                    <p class="card-text">
                        {{$foodItem->description}}
                    </p>
                    <form action="{{route('cart.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="food_item_id" value="{{$foodItem->id}}">
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light btn-sm" id="btn-minus">
                                            <i class="fas fa-minus fa-fw"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control text-center" id="quantity" name="quantity"
                                        placeholder="Kuantitas" min="1" value="1">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light btn-sm" id="btn-plus">
                                            <i class="fas fa-plus fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-cart-plus fa-fw"></i>
                            Masukan Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('end-script')
<script>
    $('#btn-plus').on('click',function(){
    const quantity =parseInt( $('#quantity').val());
            $('#quantity').val(quantity+1);
    });
    $('#btn-minus').on('click',function(){
    const quantity =parseInt( $('#quantity').val());
            if(quantity > 0){
                $('#quantity').val(quantity-1);
            }
    });
</script>
@endpush

@endsection