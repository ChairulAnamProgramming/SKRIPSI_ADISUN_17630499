<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{url('public')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('public/templates/1')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('public/templates/1')}}/assets/css/components.css">
</head>

<body>


    <div class="container mt-5 bg-white py-4 px-4">

        <div class="row">
            <div class="col-2 text-right">
                <img src="{{url('public/assets/images/logos/hss.png')}}" class="img-fluid" width="80">
            </div>
            <div class="col-8 text-center">
                <h5>PEMERINTAH KABUPATEN HULU SUNGAI SELATAN</h5>
                <h5>DINAS KETAHANAN PANGAN</h5>
                <small>Jalan Kamboja No.15 Telp./Fax.(0517) 21370</small>
                <small>Email: dinasketahananpangan.kabhss@gmail.com</small>
                <h6>KANDANGAN 71212</h6>
            </div>
            <div class="col-2"></div>
        </div>
        <hr>
        <h6 class="text-center mb-3">{{$title}}</h6>
        @yield('content')
        <br><br>
        <table class="ml-auto">
            <tr>
                <td>KEPALA DINAS,</td>
            </tr>
            <tr style="height: 50px">
                <td></td>
            </tr>
            <tr>
                <td><strong>Ir. H. AKHMAD MAWARDI</strong></td>
            </tr>
            <tr>
                <td><small>Pembina Tingkat I</small></td>
            </tr>
            <tr>
                <td><small>NIP. 19651129 199703 1 001</small></td>
            </tr>
        </table>

    </div>


    <script>
        window.print()
    </script>

</body>

</html>