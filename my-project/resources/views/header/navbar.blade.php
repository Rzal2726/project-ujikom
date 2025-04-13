
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand -->
        {{-- <img src="{{asset("/assets/images/logo.png")}}" class="img-fluid" style="max-width: 10%;" alt="logo"> --}}
        <svg width="200" height="60" viewBox="0 0 200 60" xmlns="http://www.w3.org/2000/svg" fill="none">
            <!-- Monitor Icon -->
            <rect x="5" y="5" width="40" height="30" rx="3" ry="3" fill="#2d89ef"/>
            <rect x="10" y="10" width="30" height="20" rx="1.5" ry="1.5" fill="white"/>
            <rect x="18" y="37" width="14" height="3" fill="#2d89ef" rx="1"/>
            <rect x="16" y="40" width="18" height="2" fill="#444"/>
          
            <!-- Text -->
            <text x="60" y="28" font-family="Verdana, sans-serif" font-size="22" fill="#222" font-weight="bold">TechSector</text>
            <text x="60" y="45" font-family="Verdana, sans-serif" font-size="10" fill="#888">Komputer & Aksesoris</text>
          </svg>
          
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <style>
            .navItem {
                transition: transform 0.1s linear;
            }
            .navItem:hover {
                transform: scale(1.2);
            }
        </style>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li @class(['navItem nav-item rounded', 'border shadow' => !empty($isHome) && $isHome])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('home-screen') }}"><i class="fa fa-area-chart"></i> Dashboard</a>
                </li>
                <li @class(['navItem nav-item rounded', 'border shadow' => !empty($isTransaksi) && $isTransaksi])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('transaksi-screen') }}"><i class="fa fa-file-text"></i> Transaksi</a>
                </li>
                <li @class(['navItem nav-item rounded', 'border shadow' => !empty($isPelanggan) && $isPelanggan])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('pelanggan-screen') }}"><i class="fa fa-users"></i> Pelanggan</a>
                </li>
                <li @class(['navItem nav-item rounded', 'border shadow' => !empty($isProduk) && $isProduk])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('produk-screen') }}"><i class="fa fa-archive"></i> Produk</a>
                </li>
                <li @class(['navItem nav-item rounded', 'border shadow' => !empty($isProduk) && $isProduk])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('produk-screen') }}"><i class="fa fa-list-alt"></i> Kategori</a>
                </li>
                <li @class([
                    'navItem nav-item rounded',
                    'border shadow' => !empty($isUser) && $isUser,
                ]) id="user-nav">
                    <a class="nav-link text-dark fw-semibold" href="{{ route('user-screen') }}">
                        <i class="fa fa-user"></i> User 
                    </a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <div class="dropdown ms-3">
                <button class="btn btn-outline-primary dropdown-toggle px-3" type="button" data-bs-toggle="dropdown">
                    <i class="fa fa-cog"></i> Pengaturan
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#modalProfile"><i class="fa fa-user-circle"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#" onclick="logout()"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

