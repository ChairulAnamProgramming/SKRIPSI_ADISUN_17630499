@extends('templates.index')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Stok Pangan 3 Bulan Terahir</h5>
                </div>
                <div class="card-body">
                    {!! $panganChartBulan->container() !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Stok Pangan 3 Tahun Terahir</h5>
                </div>
                <div class="card-body">
                    {!! $panganChartTahun->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@push('end-script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $panganChartBulan->script() !!}
{!! $panganChartTahun->script() !!}
@endpush

@endsection