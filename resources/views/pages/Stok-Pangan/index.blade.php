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

@push('end-script')
<script>
    $('.btn-edit').on('click',function(){
            const url = $(this).data('url');
            const title = $(this).data('title');
            const category = $(this).data('category');
            const stok = $(this).data('stok');
            const description = $(this).data('description');
            const price = $(this).data('price');
            const barn = $(this).data('barn');
            const patch = `<input type="hidden" name="_method" value="PATCH">`;
            const alertImg = `<span class="text-danger">Abaikan field jika tidak ingin mengubah gambar</span>`;

            $('#title').val(title);
            $('#food_category_id').val(category);
            $('#stock').val(stok);
            $('#description').val(description);
            $('#price').val(price);
            $('#barn_id').val(barn);
            $('#form-food-item').attr('action',url)
            $('#method-food-item').html(patch)
            $('#alert-img-patch').html(alertImg);
        })
</script>
@endpush

@endsection