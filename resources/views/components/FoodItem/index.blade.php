<div class="col-6 col-md-3">
    <div class="card rounded">
        <img class="card-img-top" src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->title}}" height="150">
        <div class="card-body">
            <small class="mb-2 d-flex">Lumbung : <span class="text-primary">
                    {{$item->barn->name}}</span></small>
            <h6 href="" class="card-title mb-2">{{Str::limit($item->title,40)}}</h6>
            <strong class="text-primary d-flex">Rp.{{number_format($item->price,2,',','.')}}</strong>
            <small class="badge badge-success  mt-2">{{$item->food_category->name}}</small>
        </div>
        <div class="card-footer py-0 pb-2">
            <a href="{{route('foodItem.show',$item->id)}}" class="btn btn-outline-primary btn-block btn-sm"><i
                    class="fas fa-search fa-fw"></i>
                Lihat
                Detail
            </a>
        </div>
    </div>
</div>