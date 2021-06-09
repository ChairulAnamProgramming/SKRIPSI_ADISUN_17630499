@extends('templates.index')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center align-items-center">
                @foreach ($foodCategories as $item)
                <div class="col-6 col-md-2">
                    <a href="{{route('home.foodItemByCategories',$item->id)}}" class="card shadow-none border rounded"
                        style="height: 150px;text-decoration:none">
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center">
                                <img src="{{url('public/storage').'/'.$item->image}}" alt="{{$item->name}}"
                                    class="img-fluid d-flex justify-content-center align-items-center text-center"
                                    width="80%">
                            </div>
                            <small>{{$item->name}}</small>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <h4 class="mb-4">Pangan Terbaru</h4>
    <div class="row">
        @foreach ($foodItems as $item)
        @include('components.FoodItem.index')
        @endforeach
    </div>
</div>

@endsection