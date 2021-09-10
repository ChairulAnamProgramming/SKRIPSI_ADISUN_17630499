@extends('templates.index')

@section('content')
<form action="{{route('checkout.proses')}}" method="GET">
    {{-- @csrf --}}

    <div class="card m-1">
        <div class="card-body">
            @foreach ($carts as $cart)
            <div class="row m-1">
                <div class="col-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkout[]" value="{{$cart->id}}">
                                </td>
                                <td class="d-flex">
                                    <img src="{{url('public/storage').'/'.$cart->foodItem->image}}"
                                        alt="{{$cart->foodItem->title}}" class="img-fluid rounded" width="80"
                                        height="80">
                                    <small class="ml-3">
                                        {{$cart->foodItem->title}}
                                    </small>
                                </td>
                                <td>
                                    <strong>{{$cart->quantity}}</strong>
                                    <i class="fas fa-times fa-fw"></i>
                                    IDR. <b>{{number_format($cart->foodItem->price,2,',','.')}}</b>
                                </td>
                                <td>
                                    IDR. <b>{{number_format($cart->foodItem->price*$cart->quantity,2,',','.')}}</b>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button class="btn btn-primary">Checkout</button>
        </div>
    </div>
</form>

@endsection


{{-- <form action="{{route('cart.destroy',$cart->id)}}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-outline-light text-danger"
    onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');">
    Hapus
</button>
</form> --}}