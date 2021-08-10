@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <form id="form" action="{{route('barn.store')}}" method="POST">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <input type="hidden" id="method">
                    <div class="form-group">
                        <label for="name">Nama Lumbung</label>
                        <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name"
                            placeholder="Tulis Nama Lumbung">
                        @error('name')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" required name="address" id="address"
                            placeholder="Tulis Alamat Lengkap Lumbung">{{old('address')}}</textarea>
                        @error('address')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="farmer_group_id">Kelompok Tani</label>
                        <select class="form-control" value="{{old('farmer_group_id')}}" required name="farmer_group_id"
                            id="farmer_group_id">
                            <option value="">-- PILIH --</option>
                            @foreach ($farmerGroups as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('farmer_group_id')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save fa-fw"></i>
                        Simpan Data
                        Lumbung
                    </button>
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
                                <td>Nama Lumbung</td>
                                <td>Alamat</td>
                                <td>Kelompok Tani</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barns as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-light btn-sm text-warning btn-icon icon-left btn-edit"
                                            data-url="{{route('barn.update',$item->id)}}" data-name="{{$item->name}}"
                                            data-address="{{$item->address}}"
                                            data-farmer_group="{{$item->farmer_group->id}}">
                                            <i class="fas fa-edit fa-fw"></i>
                                            Edit
                                        </button>
                                        <form action="{{route('barn.destroy',$item->id)}}" method="POST">
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
                                <td>{{$item->farmer_group->name}}</td>
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
    const farmer_group = $(this).data('farmer_group');
    const address = $(this).data('address');
    const url = $(this).data('url');
    
    
    $('#name').val(name);
    $('#farmer_group_id').val(farmer_group);
    $('#address').val(address);
    $('#form').attr('action',url);
    $('#method').val('PATCH');
    $('#method').attr('name','_method');

})
</script>

@endpush

@endsection