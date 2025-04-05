@extends('welcome')
@section('navbar')
    @extends('header.navbar')
@endsection

@section('modal')
    
<!-- Tambah Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Name*</label>
                        <input type="text" class="form-control rounded" id="add-nama" name="name" placeholder="Enter Name" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Alamat*</label>
                        <input type="text" class="form-control rounded" id="add-alamat" name="alamat" placeholder="Enter Address" required>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">No Telp*</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded" id="add-no" name="alamat" placeholder="Enter Address" required>
                        </div>
                    </div>     
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" onclick="add()" data-bs-dismiss="modal">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="inputId" class="form-label fw-semibold">ID</label>
                        <input type="text" class="form-control rounded" id="edit-id" name="id" placeholder="Enter ID" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Name*</label>
                        <input type="text" class="form-control rounded" id="edit-nama" name="name" placeholder="Enter Name" required autofocus> 
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Alamat*</label>
                        <input type="text" class="form-control rounded" id="edit-alamat" name="alamat" placeholder="Enter Address" required>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">No Telp*</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded" id="edit-no" name="alamat" placeholder="Enter Address" required>
                        </div>
                    </div>     
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('content')
<!-- Parameter -->
<div class="row g-4 m-4">
    <!-- Transaksi Card -->
    <div class="col-sm-6 col-xl-3">
        <div class="card shadow border-0">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="content-left">
                        <span class="text-heading fw-bold text-primary">Transaksi</span>
                        <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2 text-dark fw-bold" id="userCounter">0</h4>
                        </div>
                        <small class="text-muted">Sudah tercatat</small>
                    </div>
                    <div class="avatar">
                        <a href="#" class="text-decoration-none">
                            <span class="avatar-initial rounded-circle bg-primary d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px;">
                                <i class="fa fa-file-text fa-lg text-white"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Card -->
    <div class="col-sm-6 col-xl-3">
        <div class="card shadow border-0">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="content-left">
                        <span class="text-heading fw-bold text-danger">Produk</span>
                        <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2 text-dark fw-bold" id="liburCounter">0</h4>
                        </div>
                        <small class="text-muted">Sudah tercatat</small>
                    </div>
                    <div class="avatar">
                        <a href="#" class="text-decoration-none">
                            <span class="avatar-initial rounded-circle bg-danger d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px;">
                                <i class="fa fa-archive fa-lg text-white"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pelanggan Card -->
    <div class="col-sm-6 col-xl-3">
        <div class="card shadow border-0">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="content-left">
                        <span class="text-heading fw-bold text-success">Pelanggan</span>
                        <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2 text-dark fw-bold" id="absenCounter">0</h4>
                        </div>
                        <small class="text-muted">Sudah terdaftar</small>
                    </div>
                    <div class="avatar">
                        <a href="#" class="text-decoration-none">
                            <span class="avatar-initial rounded-circle bg-success d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px;">
                                <i class="fa fa-users fa-lg text-white"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- User Card -->
    <div class="col-sm-6 col-xl-3">
        <div class="card shadow border-0">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="content-left">
                        <span class="text-heading fw-bold text-warning">User</span>
                        <div class="d-flex align-items-center my-2">
                            <h4 class="mb-0 me-2 text-dark fw-bold" id="requestCounter">0</h4>
                        </div>
                        <small class="text-muted">Sudah Login Hari Ini</small>
                    </div>
                    <div class="avatar">
                        <a href="#" class="text-decoration-none">
                            <span class="avatar-initial rounded-circle bg-warning d-flex align-items-center justify-content-center shadow" style="width: 50px; height: 50px;">
                                <i class="fa fa-user fa-lg text-white"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Hover Effect -->
<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .btn-primary {
        transition: background-color 0.2s ease-in-out;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>


<div class="row g-4 mx-5">
    <!-- Left Column -->
    <div class="col-xl-6">
        <!-- Transaksi Table -->
        <div class="card shadow border-0 my-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-file-text fa-lg me-2 text-primary"></i>
                    <h5 class="mb-0 fw-bold">Transaksi</h5>
                </div>
                <a class="btn btn-primary btn-sm shadow-sm" href="#" role="button">See More</a>
            </div>
            <div class="table-responsive text-nowrap p-3">
                <table class="table table-striped table-hover">
                    <thead id="user-head"></thead>       
                    <tbody id="user-body"></tbody>
                </table>
            </div>
        </div>

        <!-- Produk Table -->
        <div class="card shadow border-0 my-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-archive fa-lg me-2 text-danger"></i>
                    <h5 class="mb-0 fw-bold">Produk</h5>
                </div>
                <a class="btn btn-primary btn-sm shadow-sm" href="#" role="button">See More</a>
            </div>
            <div class="table-responsive text-nowrap p-3">
                <table class="table table-striped table-hover">
                    <thead id="reimbursement-head"></thead>       
                    <tbody id="reimbursement-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-xl-6">
        <!-- Pelanggan Table -->
        <div class="card shadow border-0 my-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-users fa-lg me-2 text-success"></i>
                    <h5 class="mb-0 fw-bold">Pelanggan</h5>
                </div>
                <a class="btn btn-primary btn-sm shadow-sm" href="#" role="button">See More</a>
            </div>
            <div class="table-responsive text-nowrap p-3">
                <table class="table table-striped table-hover">
                    <thead id="absen-head"></thead>       
                    <tbody id="absen-body"></tbody>
                </table>
            </div>
        </div>

        <!-- User Table -->
        <div class="card shadow border-0 my-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center p-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-user fa-lg me-2 text-warning"></i>
                    <h5 class="mb-0 fw-bold">User</h5>
                </div>
                <a class="btn btn-primary btn-sm shadow-sm" href="#" role="button">See More</a>
            </div>
            <div class="table-responsive text-nowrap p-3">
                <table class="table table-striped table-hover">
                    <thead id="cuti-head"></thead>       
                    <tbody id="cuti-body"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Bootstrap Modal Test:", bootstrap?.Modal ? "Loaded" : "Not Loaded");
    });
</script>
<script src="{{asset("/assets/js/pelanggan.js")}}" defer></script> --}}
@endsection
