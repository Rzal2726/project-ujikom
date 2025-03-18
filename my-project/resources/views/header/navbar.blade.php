<nav
    class="navbar navbar-expand-sm bg-primary navbar-dark p-3"
>
    {{-- <a class="navbar-brand" href="#">Logo</a> --}}
    <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"
    ></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="#"><span><i class="fa fa-home mx-1"></i></span>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><span><i class="fa fa-list mx-1"></i></span>Transaksi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><span><i class="fa fa-user mx-1"></i></span>Pelanggan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><span><i class="fa fa-th mx-1"></i></span>Stok Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><span><i class="fa fa-users mx-1"></i></span>User</a>
            </li>
        </ul>
        <div class="m-2">
            <div class="dropdown open mx-2">
                <button
                    class="btn btn-secondary dropdown-toggle rounded"
                    type="button"
                    id="triggerId"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                <span><i class="fa fa-gear mx-1"></i></span> Settings
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <button class="dropdown-item" href="#"><span><i class="fa fa-user mx-1"></i></span>Profile</button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" href="#"><span><i class="fa fa-sign-out mx-1"></i></span>Logout</button>
                </div>
            </div>
        </div>
    </div>
</nav>



