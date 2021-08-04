<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{url('public/assets/images/logos/hss.png')}}" class="img-fluid" alt="HULU SUNGAI SELATAN"
                width="40">
            <a href="{{route('home')}}">Ketahanan Pangan</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu Utama</li>
            <li class="nav-item {{$title === 'Beranda'?'active':''}}">
                <a href="{{route('home')}}" class="nav-link "><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>

            @if (Auth::user())
            @if (Auth::user()->role === 'user')
            @php
            $cartProses = App\Models\Cart::where('user_id',Auth::user()->id)->where('status','proses')->count();
            $cartBerhasil = App\Models\Cart::where('user_id',Auth::user()->id)->where('status','berhasil')->count();
            @endphp
            <li class="nav-item {{$title === 'cart'?'active':''}}">
                <a href="{{route('cart.index')}}" class="nav-link "><i class="fas fa-shopping-basket"></i>
                    <span>Keranjang</span>
                    @if ($cartProses)
                    <small class="badge badge-danger">{{$cartProses}}</small>
                    @endif
                </a>
            </li>
            <li class="nav-item {{$title === 'checkout'?'active':''}}">
                <a href="{{route('checkout.index')}}" class="nav-link "><i class="fas fa-shipping-fast"></i>
                    <span>Pesanan</span>
                    @if ($cartBerhasil)
                    <small class="badge badge-danger">{{$cartBerhasil}}</small>
                    @endif
                </a>
            </li>
            @endif
            @if (Auth::user()->role === 'admin')
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('farmer.index')}}">Tani</a></li>
                    <li>
                        <a class="nav-link" href="{{route('farmerGroup.index')}}"></i>
                            <span>Kelompok Tani</span>
                        </a>
                    </li>
                    <li><a class="nav-link" href="{{route('barn.index')}}">Lumbung</a></li>
                    <li><a class="nav-link" href="{{route('barnManager.index')}}">Pengelola Lumbung</a></li>
                </ul>
            </li>
            @php
            $cartBerhasilAdmin = App\Models\Cart::where('status','berhasil')->count();
            @endphp
            <li class="nav-item {{$title === 'Pesanan User'?'active':''}}">
                <a href="{{route('checkout.admin')}}" class="nav-link "><i class="fas fa-shipping-fast"></i>
                    <span>Pesanan Pelanggan</span>
                    @if ($cartBerhasilAdmin)
                    <small class="badge badge-danger">{{$cartBerhasilAdmin}}</small>
                    @endif
                </a>
            </li>
            @endif
            @endif
            {{-- <li>
                <a class="nav-link" href="#"><i class="far fa-boxes fa-fw"></i>
                    <span>Cadangan Pangan</span>
                </a>
            </li> --}}
            <li>
                <a class="nav-link" href="{{route('foodItem.index')}}"><i class="fas fa-boxes fa-fw"></i>
                    <span>Stok Pangan</span>
                    <i class="{{!Auth::user()?'fas fa-lock fa-fw text-warning':''}}"></i>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('chart.index')}}"><i class="fas fa-chart-bar fa-fw"></i>
                    <span>Grapik</span>
                </a>
            </li>
            @if (Auth::user())
            @if (Auth::user()->role === 'admin')
            <li>
                <a class="nav-link" href="{{route('report.index')}}">
                    <i class="fas fa-file-alt fa-fw"></i>
                    <span>Report</span>
                </a>
            </li>
            @endif
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            @if (Auth::user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            @else
            <a href="{{route('login')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            @endif
        </div>
    </aside>
</div>