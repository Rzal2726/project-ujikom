
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand -->
        <img src="" alt="">
        <a class="navbar-brand fw-bold text-white border border-primary bg-primary bg-gradient border-5 rounded p-2" href="#"><i class="fa fa-tachometer-alt"></i> RL Products Manager</a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li @class(['nav-item', 'border rounded' => !empty($isHome) && $isHome])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('home-screen') }}"><i class="fa fa-area-chart"></i> Dashboard</a>
                </li>
                <li @class(['nav-item', 'border rounded' => !empty($isTransaksi) && $isTransaksi])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('transaksi-screen') }}"><i class="fa fa-list"></i> Transaksi</a>
                </li>
                <li @class(['nav-item', 'border rounded' => !empty($isPelanggan) && $isPelanggan])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('pelanggan-screen') }}"><i class="fa fa-users"></i> Pelanggan</a>
                </li>
                <li @class(['nav-item', 'border rounded' => !empty($isProduk) && $isProduk])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('produk-screen') }}"><i class="fa fa-archive"></i> Produk</a>
                </li>
                <li @class(['nav-item', 'border rounded' => !empty($isUser) && $isUser])>
                    <a class="nav-link text-dark fw-semibold" href="{{ route('user-screen') }}"><i class="fa fa-user"></i> User</a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
            <div class="dropdown ms-3">
                <button class="btn btn-outline-primary dropdown-toggle px-3" type="button" data-bs-toggle="dropdown">
                    <i class="fa fa-cog"></i> Pengaturan
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user-circle"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>