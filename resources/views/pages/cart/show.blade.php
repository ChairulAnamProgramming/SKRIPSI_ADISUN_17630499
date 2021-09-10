@extends('templates.index')

@section('content')
<form action="{{route('checkout.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-body">
            <h5 class="text-primary">
                <i class="fas fa-map-marker-alt fa-fw"></i>
                Alamat Pengirim
            </h5>
            <table>
                <tr>
                    <td valign="top">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control form-control-sm border-0"
                                placeholder="Tulis nama anda" value="{{Auth::user()->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </td>
                    <td valign="top">
                        <div class="form-group">
                            <textarea type="text" name="address" id="address"
                                class="form-control form-control-sm border-0"
                                placeholder="Tulis alamat tempat tinggal anda"></textarea>
                            @error('address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>
                            <h5>Produk Dipesan</h5>
                        </th>
                        <th class="text-secondary">
                            Harga Satuan
                        </th>
                        <th class="text-secondary">
                            Jumlah
                        </th>
                        <th class="text-secondary">
                            Subtotal Produk
                        </th>
                    </tr>
                    @php
                    $subtotal = 0;
                    @endphp
                    @foreach ($cart as $item)
                    @php
                    $subtotal +=$item->foodItem->price*$item->quantity;
                    @endphp
                    <tr>
                        <td>
                            <p class="mt-3 mb-0">
                                <i class="fa fa-fw fa-store"></i>
                                {{$item->foodItem->barn->name}}
                            </p>
                            <img src="{{url('public/storage').'/'.$item->foodItem->image}}"
                                alt="{{$item->foodItem->title}}" class="img-fluid rounded border" width="40"
                                height="40">
                            <small class="ml-3">
                                {{Str::limit($item->foodItem->title,30)}}
                            </small>
                            <small class="ml-3 text-secondary">
                                {{$item->foodItem->food_category->name}}
                            </small>
                        </td>
                        <td>
                            IDR.{{number_format($item->foodItem->price,2,',','.')}}
                        </td>
                        <td>
                            {{$item->quantity}}
                        </td>
                        <td>
                            <strong class="text-primary">
                                IDR.{{number_format($item->foodItem->price*$item->quantity,2,',','.')}}
                            </strong>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h6>Bank Transfer</h6>
            <div class="d-flex">
                <img src="{{url('public/assets/images/bri.png')}}" class="img-fluid rounded border"
                    style="width: 40px;height:40px">
                <div class="ml-3">
                    <small class="text-dark d-block">Bank BRI (Dicek Manual)</small>
                    <small class="text-success d-block">A/N Dinas Ketahanan Pangan HSS</small>
                    <strong class="text-dark">3244-01-012222-11-1</strong>
                </div>
                <div class="ml-4">
                    <label for="">Upload Bukti Pembayaran</label>
                    <input type="file" name="file" id="file" class="form-control form-control-sm">
                    @error('file')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <hr>
            <table class="ml-auto">
                <tr>
                    <td><small>Subtotal untuk produk</small></td>
                    <td style="width: 20px"></td>
                    <td><small>IDR.{{number_format($subtotal,2,',','.')}}</small></td>
                </tr>
                <tr>
                    <td><small>Biaya Penanganan</small></td>
                    <td style="width: 20px"></td>
                    <td><small>IDR.1.000,00</small></td>
                </tr>
                <tr>
                    <td><small>Total Pembayaran</small></td>
                    <td style="width: 20px"></td>
                    <td>
                        <h4 class="text-primary">
                            IDR.{{number_format(($subtotal)+1000,2,',','.')}}</h4>
                        <input type="hidden" value="{{Crypt::encrypt(($subtotal)+1000)}}" name="total_price">
                        @foreach ($cart as $item)
                        <input type="hidden" value="{{Crypt::encrypt(($item->id))}}" name="cart_id[]">
                        @endforeach
                    </td>
                </tr>
            </table>
            <hr>
            <div class="row">
                <div class="col-12 text-right">
                    <button class="btn btn-primary ml-auto">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </div>


</form>

@endsection