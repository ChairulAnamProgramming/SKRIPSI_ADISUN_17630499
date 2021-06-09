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
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('farmer.index')}}">Tani</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{route('farmerGroup.index')}}"><i class="fas fa-users fa-fw"></i>
                    <span>Kelompok Tani</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-warehouse fa-fw"></i>
                    <span>Lumbung</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('barn.index')}}">Lumbung</a></li>
                    <li><a class="nav-link" href="{{route('barnManager.index')}}">Pengelola Lumbung</a></li>
                </ul>
            </li>
            {{-- <li>
                <a class="nav-link" href="#"><i class="far fa-boxes fa-fw"></i>
                    <span>Cadangan Pangan</span>
                </a>
            </li> --}}
            <li>
                <a class="nav-link" href="{{route('foodItem.index')}}"><i class="fas fa-boxes fa-fw"></i>
                    <span>Stok Pangan</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{route('foodItem.index')}}"><i class="fas fa-chart-bar fa-fw"></i>
                    <span>Grapik</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>
</div>