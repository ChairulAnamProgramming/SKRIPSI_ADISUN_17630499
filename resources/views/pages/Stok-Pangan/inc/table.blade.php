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
                    <form action="{{route('foodItem.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"
                            class="btn btn-light  btn-sm text-danger btn-icon icon-left">
                            <i class="fas fa-trash fa-f"></i>
                            Hapus
                        </button>
                    </form>
                    <button class="btn btn-light btn-sm text-warning btn-icon icon-left btn-edit"
                        data-url="{{route('foodItem.update',$item->id)}}" data-title="{{$item->title}}"
                        data-category="{{$item->food_category_id}}" data-stok="{{$item->stock}}"
                        data-description="{{$item->description}}" data-price="{{$item->price}}"
                        data-barn="{{$item->barn_id}}">
                        <i class="fas fa-edit fa-fw"></i>
                        Edit
                    </button>
                </div>
            </td>
            <td>{{$item->title}}</td>
            <td class="text-center">
                <img src="{{url('public/storage').'/'.$item->food_category->image}}"
                    alt="{{$item->food_category->name}}" class="img-fluid" width="50">
                <span>{{$item->food_category->name}}</span>
            </td>
            <td>{{$item->barn->name}}</td>
            <td>{{$item->stock}}</td>
            <td>{{$item->description}}</td>
            <td>Rp.{{number_format($item->price,2,',','.')}}</td>
            <td><img src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->title}}" class="img-fluid rounded"
                    style="width: 60px,height:60px"></td>
        </tr>
        @endforeach
    </tbody>
</table>