@extends('templates.index')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
            {!! $panganChart->container() !!}
        </div>
    </div>
</div>


@push('end-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $panganChart->script() !!}
@endpush

@endsection