@extends('templates.index')

@section('content')

<div class="row ">
    <div class="col-12 col-md-12">
        <div class="card m-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <ul>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalStokPangan">Report Stok Pangan</a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalJumlahStokPangan">
                                    Report Jumlah Stok Pangan Perlumbung
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalPesananUser">Report Pesanan User</a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalPesanan">Report Pesanan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <ul>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalPengelolaLumbung">
                                    Report Pengelola Lumbung
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-primary" data-toggle="modal"
                                    data-target="#modalPesananPanganTerbanyak">
                                    Report Pesanan Pangan Terbanyak
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration-none text-primary">
                                    Report Kelompok Tani Terdaftar 1 bulan Terakhit
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('end-script')
@include('pages.report.inc.modal')
@endpush


@endsection