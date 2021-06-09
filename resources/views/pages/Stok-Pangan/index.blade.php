@extends('templates.index')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        @include('pages.Stok-Pangan.inc.form')
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @include('pages.Stok-Pangan.inc.table')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection