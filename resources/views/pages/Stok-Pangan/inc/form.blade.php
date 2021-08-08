<form id="form-food-item" action="{{@$foodItem ?route('foodItem.update',$foodItem->id):route('foodItem.store')}}"
    method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            @csrf

            <div id="method-food-item"></div>

            @if (@$foodItem)
            @method('PATCH')
            @endif
            <div class="form-group">
                <label for="title">Title Pangan</label>
                <input type="text" class="form-control" value="{{@$foodItem ?$foodItem->title:old('title')}}" required
                    name="title" id="title" placeholder="Tulis Title Pangan">
                @error('title')
                <strong>
                    <span class="text-danger">{{$message}}</span>
                </strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="food_category_id">Kategori</label>
                <select class="form-control" value="{{old('food_category_id')}}" required name="food_category_id"
                    id="food_category_id">
                    <option value="">-- PILIH --</option>
                    @foreach ($foodCategories as $item)
                    <option value="{{$item->id}}" {{@$foodItem->food_category_id===$item->id?'selected':''}}>
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
                <input type="number" class="form-control" value="{{@$foodItem ?$foodItem->stock:old('stock')}}" required
                    name="stock" id="stock" placeholder="Tulis Stok Awal Pangan">
                @error('stock')
                <strong>
                    <span class="text-danger">{{$message}}</span>
                </strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description"
                    placeholder="Tulis Deskripsi Pangan">{{@$foodItem ?$foodItem->description:old('description')}}</textarea>
                @error('description')
                <strong>
                    <span class="text-danger">{{$message}}</span>
                </strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" value="{{@$foodItem ?$foodItem->price:old('price')}}" required
                    name="price" id="price" placeholder="Tulis Harga Pangan">
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
                    <option value="{{$item->id}}" {{@$foodItem->barn_id===$item->id?'selected':''}}>{{$item->name}}
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
                <input type="file" class="form-control" value="{{old('image')}}" name="image" id="image"
                    placeholder="Tulis Harga Pangan">
                @if (@$foodItem->id)
                <span class="text-warning">Tidak usah di isi jika tidak ingin merubah gambar</span>
                @endif
                <span id="alert-img-patch"></span>
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