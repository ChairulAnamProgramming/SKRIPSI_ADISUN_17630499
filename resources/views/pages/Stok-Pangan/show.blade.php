@extends('templates.index')

@section('content')

<div class="container">
    <div class="card">
        <img class="card-img-top" src="{{url('public/storage').'/'.$foodItem->image}}" alt="{{$foodItem->title}}"
            class="img-fluid" style="height: 400px">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Text</p>
        </div>
    </div>
</div>

@endsection