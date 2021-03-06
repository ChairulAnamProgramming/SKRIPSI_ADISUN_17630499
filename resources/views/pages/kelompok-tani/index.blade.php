@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <form id="form" action="{{route('farmerGroup.store')}}" method="POST">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <input type="hidden" id="method">
                    <div class="form-group">
                        <label for="name">Nama Kelompok</label>
                        <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name"
                            placeholder="Tulis Nama Lengkap Tani">
                        @error('name')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" required name="address" id="address"
                            placeholder="Tulis Alamat Lengkap Kelompok Tani">{{old('address')}}</textarea>
                        @error('address')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="chairman">Ketua Kelompok</label>
                        <select class="form-control" value="{{old('chairman')}}" required name="chairman" id="chairman">
                            <option value="">-- PILIH --</option>
                            @foreach ($farmer as $item)
                            <option value="{{$item->id}}">{{$item->user->name}} | {{$item->nik}}</option>
                            @endforeach
                        </select>
                        @error('chairman')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="farmer_id[]">Anggota</label>
                        <select class="form-control" value="{{old('farmer_id[]')}}" name="farmer_id[]" id="farmer_id[]"
                            multiple>
                            @foreach ($farmer as $item)
                            <option value="{{$item->id}}">{{$item->user->name}} | {{$item->nik}}</option>
                            @endforeach
                        </select>
                        @error('farmer_id[]')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save fa-fw"></i> Simpan Data
                        Kelompok Tani</button>
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
                                <td>Nama Kelompok</td>
                                <td>Alamat</td>
                                <td>Jumlah Anggota</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmerGroups as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-light btn-sm text-warning btn-icon icon-left btn-edit"
                                            data-url="{{route('farmerGroup.update',$item->id)}}"
                                            data-name="{{$item->name}}" data-address="{{$item->address}}"
                                            data-farmer_id="{{$item->farmer_id}}">
                                            <i class="fas fa-edit fa-fw"></i>
                                            Edit
                                        </button>
                                        <form action="{{route('farmerGroup.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"
                                                class="btn btn-light  btn-sm text-danger btn-icon icon-left">
                                                <i class="fas fa-trash fa-f"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <a href="#">
                                        {{$item->farmers->count()}}
                                    </a>
                                </td>
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
    const farmer_id = $(this).data('farmer_id');
    const address = $(this).data('address');
    const url = $(this).data('url');
    
    $('#name').val(name);
    $('#chairman').val(farmer_id);
    $('#address').val(address);
    $('#form').attr('action',url);
    $('#method').val('PATCH');
    $('#method').attr('name','_method');

})
</script>

@endpush


@endsection