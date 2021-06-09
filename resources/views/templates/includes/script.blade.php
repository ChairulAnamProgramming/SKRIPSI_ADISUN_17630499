<!-- General JS Scripts -->
<script src="{{url('public')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{url('public')}}/js/popper.min.js"></script>
<script src="{{url('public')}}/js/bootstrap.min.js"></script>
<script src="{{url('public')}}/js/datatables.min.js"></script>
<script src="{{url('public')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{url('public')}}/js/moment.min.js"></script>
<script src="{{url('public/templates/1')}}/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{url('public/templates/1')}}/assets/js/scripts.js"></script>
<script src="{{url('public/templates/1')}}/assets/js/custom.js"></script>

<script>
    $(document).ready(function() {
    $('.datatable').DataTable({
        "oLanguage": {
        "sSearch": "Pencarian"
        }
    });
} );
</script>

@stack('end-script')