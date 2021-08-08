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


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">{{$title}}</h4>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>


    <script>
        window.print()
    </script>

</body>

</html>