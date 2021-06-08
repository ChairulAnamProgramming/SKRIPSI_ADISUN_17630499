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
            <li class="nav-item active">
                <a href="#" class="nav-link "><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('farmer.index')}}">Tani</a></li>
                    <li><a class="nav-link" href="{{route('farmerGroup.index')}}">Kelompok Tani</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Lumbung</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('barn.index')}}">Lumbung</a></li>
                    <li><a class="nav-link" href="#">Pengelola Lumbung</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="#"><i class="far fa-square"></i>
                    <span>Cadangan Pangan</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="blank.html"><i class="far fa-square"></i>
                    <span>Stok Pangan</span>
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