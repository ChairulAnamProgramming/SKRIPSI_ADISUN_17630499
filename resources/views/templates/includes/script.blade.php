<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{url('public/templates/1')}}/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{url('public/templates/1')}}/assets/js/scripts.js"></script>
<script src="{{url('public/templates/1')}}/assets/js/custom.js"></script>

<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/date-1.1.0/r-2.2.8/sc-2.0.4/datatables.min.js">
</script>

<script>
    $(document).ready(function() {
    $('.datatable').DataTable({
        "oLanguage": {
        "sSearch": "Pencarian"
        }
    });
} );
</script>