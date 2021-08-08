<!-- Stok Pangan -->
<div class="modal fade" id="modalStokPangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.stok-pangan')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Stok Pangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="from">Dari Tanggal</label>
                        <input type="date" name="from" id="from" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="to">Tampai Tanggal</label>
                        <input type="date" name="to" id="to" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Stok Pangan -->
<div class="modal fade" id="modalJumlahStokPangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.stok-pangan-perlumbung')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Jumlah Stok Pangan Perlumbung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="barn_id">Lumbung</label>
                        <select type="month" name="barn_id" id="barn_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($barns as $barn)
                            <option value="{{$barn->id}}">{{$barn->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" name="bulan" id="bulan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Pesanan User -->
<div class="modal fade" id="modalPesananUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.pesanan-user')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Pesanan User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">Nama User</label>
                        <select type="month" name="user_id" id="user_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" name="bulan" id="bulan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Pesanan -->
<div class="modal fade" id="modalPesanan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.pesanan')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Pesanan Seluruh User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" name="bulan" id="bulan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Pengelola Lumbung -->
<div class="modal fade" id="modalPengelolaLumbung" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.pengelola-lumbung')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Pengelola Lumbung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" name="bulan" id="bulan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Pesanan Pangan Terbanyak -->
<div class="modal fade" id="modalPesananPanganTerbanyak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('report.pesanan-pangan-terbanyak')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Report Pesanan Pangan Terbanyak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <input type="month" name="bulan" id="bulan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">
                        <i class="fas fa-print fa-fw"></i>
                        Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>