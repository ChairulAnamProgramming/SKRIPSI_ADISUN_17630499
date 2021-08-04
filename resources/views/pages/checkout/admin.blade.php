@extends('templates.index')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Produk Dipesan</th>
                        <th>Akun Yang Membuat Pesanan</th>
                        <th>Nama & Alamat Penerima</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Subtotal Produk</th>
                        <th>
                            <span class="text-danger">*</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>
                            <p>
                                <i class="fa fa-fw fa-store"></i>
                                {{$cart->foodItem->barn->name}}
                            </p>
                            <img src="{{url('public/storage').'/'.$cart->foodItem->image}}"
                                alt="{{$cart->foodItem->title}}" class="img-fluid rounded" width="40" height="40">
                            <small class="ml-3">
                                {{Str::limit($cart->foodItem->title,30)}}
                            </small>
                            <small class="ml-3 text-secondary">
                                {{$cart->foodItem->food_category->name}}
                            </small>
                        </td>
                        <td>
                            {{$cart->user->name}}
                        </td>
                        <td>
                            <h6 class="mb-0">{{$cart->checkout->name}}</h6>
                            <small>{{$cart->checkout->address}}</small>
                        </td>
                        <td>
                            IDR.{{number_format($cart->foodItem->price,2,',','.')}}
                        </td>
                        <td>
                            {{$cart->quantity}}
                        </td>
                        <td>
                            @switch($cart->status)
                            @case('berhasil')
                            <span class="badge badge-warning">Menunggu Pengiriman</span>
                            @break
                            @case('dikirim')
                            <span class="badge badge-info">Barang di kirim</span>
                            @break
                            @case('diterima')
                            <span class="badge badge-success">Berhasil di terima</span>
                            @break

                            @endswitch
                        </td>
                        <td>
                            <a href="{{url('public/storage').'/'.$cart->checkout->file}}">
                                <i class="fas fa-eye fa-fw"></i> Lihat
                            </a>
                        </td>
                        <td>
                            <strong class="text-primary">
                                IDR.{{number_format($cart->foodItem->price*$cart->quantity,2,',','.')}}
                            </strong>
                        </td>
                        <td>
                            @if ($cart->status === 'berhasil')
                            <form action="{{route('cart.update',$cart->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{Crypt::encrypt('dikirim')}}" name="status">
                                <button class="btn btn-success btn-sm">
                                    Kirim
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection