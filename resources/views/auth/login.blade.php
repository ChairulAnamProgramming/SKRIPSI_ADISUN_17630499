<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('public/templates')}}/1/assets/css/style.css">
    <link rel="stylesheet" href="{{url('public/templates')}}/1/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="{{url('public')}}/assets/images/logos/hss.png" alt="Hulu Sungai Selatan" width="80"
                            class="shadow-light mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Slamat Datang di aplikasi <span
                                class="font-weight-bold"> Dinas Ketahanan Pangan HSS</span>
                        </h4>
                        <p class="text-muted">Sebelum memulai, Anda harus login atau mendaftar jika Anda belum memiliki
                            akun.</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <x-jet-label for="username" value="{{ __('username') }}" />
                                <x-jet-input id="username" class="form-control " type="text" name="username"
                                    :value="old('username')" required autofocus />
                                @error('username')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="form-control " type="password" name="password"
                                    required autocomplete="current-password" />
                                @error('password')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <x-jet-checkbox id="remember_me" name="remember" class="custom-control-input" />
                                    <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-lg btn-icon icon-right">
                                    Masuk
                                </button>
                            </div>

                            {{-- <div class="mt-5 text-center">
                                Don't have an account? <a href="auth-register.html">Create new one</a>
                            </div> --}}
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; DINAS KETAHANAN PANGAN HSS
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="{{url('public/templates')}}/1/assets/img/unsplash/login-bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                @php
                                $hour = date('G');
                                @endphp
                                @if ($hour >= 1 && $hour <=11) <h1 class="mb-2 display-4 font-weight-bold">
                                    Selamat
                                    Pagi
                                    </h1>
                                    @elseif($hour >= 12 && $hour <= 17) <h1 class="mb-2 display-4 font-weight-bold">
                                        Selamat Siang
                                        </h1>
                                        @else
                                        <h1 class="mb-2 display-4 font-weight-bold">
                                            Selamat Malam
                                        </h1>
                                        @endif
                                        <h5 class="font-weight-normal text-muted-transparent">Kandangan, Hulu Sungai
                                            Selatan Kalimantan Selatan</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="#">Kantor Dinas Ketahanan Pangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
    <script src="{{url('public/templates')}}/1/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{url('public/templates')}}/1/assets/js/scripts.js"></script>
    <script src="{{url('public/templates')}}/1/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>
{{-- 


<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <x-jet-label for="username" value="{{ __('username') }}" />
        <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
            required autofocus />
    </div>

    <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif

        <x-jet-button class="ml-4">
            {{ __('Log in') }}
        </x-jet-button>
    </div>
</form>
</x-jet-authentication-card>
</x-guest-layout> --}}