@extends('templates.index')

@section('content')


<div class="container">
    @foreach ($foodItems as $item)
    @include('components.FoodItem.index')
    @endforeach
</div>

@endsection