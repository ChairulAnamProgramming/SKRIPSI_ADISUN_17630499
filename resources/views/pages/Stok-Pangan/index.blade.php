@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <form action="{{route('foodItem.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title Pangan</label>
                        <input type="text" class="form-control" value="{{old('title')}}" required name="title"
                            id="title" placeholder="Tulis Title Pangan">
                        @error('title')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="food_category_id">Kategori</label>
                        <select class="form-control" value="{{old('food_category_id')}}" required
                            name="food_category_id" id="food_category_id">
                            <option value="">-- PILIH --</option>
                            @foreach ($foodCategories as $item)
                            <option value="{{$item->id}}" {{old('food_category_id')===$item->id?'selected':''}}>
                                {{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('food_category_id')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok Pangan</label>
                        <input type="text" class="form-control" value="{{old('stock')}}" required name="stock"
                            id="stock" placeholder="Tulis Stok Awal Pangan">
                        @error('stock')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description"
                            placeholder="Tulis Deskripsi Pangan">{{old('description')}}</textarea>
                        @error('description')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" value="{{old('price')}}" required name="price"
                            id="price" placeholder="Tulis Harga Pangan">
                        @error('price')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="barn_id">Nama Lumbung</label>
                        <select class="form-control" value="{{old('barn_id')}}" required name="barn_id" id="barn_id">
                            <option value="">-- PILIH --</option>
                            @foreach ($barns as $item)
                            <option value="{{$item->id}}" {{old('barn_id')===$item->id?'selected':''}}>{{$item->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('barn_id')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control" value="{{old('image')}}" required name="image"
                            id="image" placeholder="Tulis Harga Pangan">
                        @error('image')
                        <strong>
                            <span class="text-danger">{{$message}}</span>
                        </strong>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save fa-fw"></i>
                        Simpan Data Pangan
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable" style="width: 100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Opsi</td>
                                <td>Title Pangan</td>
                                <td>Kategori</td>
                                <td>Nama Lumbung</td>
                                <td>Stok</td>
                                <td>Deskripsi</td>
                                <td>Harga</td>
                                <td>Gambar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foodItems as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-light  btn-sm text-danger btn-icon icon-left">
                                            <i class="fas fa-trash fa-f"></i>
                                            Hapus
                                        </button>
                                        <button class="btn btn-light btn-sm text-warning btn-icon icon-left">
                                            <i class="fas fa-edit fa-fw"></i>
                                            Edit
                                        </button>
                                    </div>
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->barn->name}}</td>
                                <td class="text-center">
                                    <img src="{{url('public/storage').'/'.$item->food_category->image}}"
                                        alt="{{$item->food_category->name}}" class="img-fluid" width="50">
                                    <span>{{$item->food_category->name}}</span>
                                </td>
                                <td>{{$item->stock}}</td>
                                <td>{{$item->description}}</td>
                                <td>Rp.{{number_format($item->price,2,',','.')}}</td>
                                <td><img src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->title}}"
                                        class="img-fluid rounded" style="width: 60px,height:60px"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection