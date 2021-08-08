@extends('templates.print')

@section('content')


<table class="table table-bordered" style="width: 100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Title Pangan</td>
            <td>Jumlah <i class="fas fa-times fa-fw"></i> Harga Pangan </td>
            <td>Total</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $cart)
        <tr>
            <td>{{$loop->iteration}}</td>

            <td class="d-flex">
                <img src="{{url('public/storage').'/'.$cart->foodItem->image}}" alt="{{$cart->foodItem->title}}"
                    class="img-fluid rounded" width="80">
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
                @switch($cart->status)
                @case('berhasil')
                <span class="text-warning">Menunggu Pengiriman</span>
                @break
                @case('dikirim')
                <span class="text-info">Barang di kirim</span>
                @break
                @case('diterima')
                <span class="text-success">Berhasil di terima</span>
                @break

                @endswitch
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection