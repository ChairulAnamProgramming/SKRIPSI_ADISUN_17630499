@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <form id="form" action="{{route('farmer.store')}}" method="POST">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <input type="hidden" id="method">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name"
                            placeholder="Tulis Nama Lengkap Tani">
                        @error('name')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" value="{{old('nik')}}" required name="nik" id="nik"
                            placeholder="Tulis NIK KTP Tani">
                        <small class="text-warning">NIK juga dipakai sebagai password untuk tani.</small>
                        @error('nik')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" required name="address" id="address"
                            placeholder="Tulis Alamat Lengkap Tani Sesuai KTP">{{old('address')}}</textarea>
                        @error('address')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Hp</label>
                        <input type="number" class="form-control" value="{{old('phone')}}" required name="phone"
                            id="phone" placeholder="Tulis Nomor Handphone Tani Yang Aktif">
                        @error('phone')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="place_of_birth">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{old('place_of_birth')}}" required
                                    name="place_of_birth" id="place_of_birth" placeholder="Tulis Tempat Lahir Tani">
                                @error('place_of_birth')
                                <strong>
                                    <span class="text-danger">{{$message}}</span>
                                </strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="date" class="form-control"
                                    value="{{old('date_of_birth')?date('Y-m-d',strtotime(old('date_of_birth'))):date('Y-m-d')}}"
                                    required name="date_of_birth" id="date_of_birth"
                                    placeholder="Tulis Tanggal Lahir Tani">
                                @error('date_of_birth')
                                <strong>
                                    <span class="text-danger">{{$message}}</span>
                                </strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="username">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" value="{{old('username')}}" required name="username"
                            placeholder="Tulis Username Tidak Boleh Pakai Spasi">
                        @error('username')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save fa-fw"></i> Simpan Data
                        Tani</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Opsi</td>
                                <td>Nama</td>
                                <td>NIK</td>
                                <td>Alamat</td>
                                <td>Nomor Hp</td>
                                <td>TTL</td>
                                <td>Username <b>(Unique)</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmers as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-light btn-sm text-warning btn-icon icon-left btn-edit"
                                            data-name="{{$item->user->name}}" data-nik="{{$item->nik}}"
                                            data-address="{{$item->address}}" data-phone="{{$item->phone}}"
                                            data-place_of_birth="{{$item->place_of_birth}}"
                                            data-url="{{route('farmer.update',$item->id)}}"
                                            data-date_of_birth="{{$item->date_of_birth}}">
                                            <i class="fas fa-edit fa-fw"></i>
                                            Edit
                                        </button>
                                        <form action="{{route('farmer.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                class="btn btn-light  btn-sm text-danger btn-icon icon-left">
                                                <i class="fas fa-trash fa-f"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->place_of_birth.','.date('d-m-Y',strtotime($item->date_of_birth))}}</td>
                                <td>{{$item->user->username}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('end-script')
<script>
    $('.btn-edit').on('click',function(){
    const name = $(this).data('name');
    const nik = $(this).data('nik');
    const address = $(this).data('address');
    const phone = $(this).data('phone');
    const date_of_birth = $(this).data('date_of_birth');
    const place_of_birth = $(this).data('place_of_birth');
    const url = $(this).data('url');
    
    
    $('#name').val(name);
    $('#username').remove();
    $('#nik').val(nik);
    $('#address').val(address);
    $('#phone').val(phone);
    $('#date_of_birth').val(date_of_birth);
    $('#place_of_birth').val(place_of_birth);
    $('#form').attr('action',url);
    $('#method').val('PATCH');
    $('#method').attr('name','_method');

})
</script>

@endpush


@endsection