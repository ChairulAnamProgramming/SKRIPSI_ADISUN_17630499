@extends('templates.index')

@section('content')


<div class="container">
    <div class="row">
        @foreach ($foodItems as $item)
        @include('components.FoodItem.index')
        @endforeach
    </div>
</div>

@endsection