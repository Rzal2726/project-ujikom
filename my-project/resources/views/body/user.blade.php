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
                        <label for="inputId" class="form-label fw-semibold">ID</label>
                        <input type="text" class="form-control rounded" id="inputId" name="id" placeholder="Enter ID" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Name*</label>
                        <input type="text" class="form-control rounded" id="inputName" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Alamat*</label>
                        <input type="text" class="form-control rounded" id="inputAlamat" name="alamat" placeholder="Enter Address" required>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">No Telp*</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded" id="inputAlamat" name="alamat" placeholder="Enter Address" required>
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
                        <input type="text" class="form-control rounded" id="inputId" name="id" placeholder="Enter ID" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Name*</label>
                        <input type="text" class="form-control rounded" id="inputName" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Alamat*</label>
                        <input type="text" class="form-control rounded" id="inputAlamat" name="alamat" placeholder="Enter Address" required>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">No Telp*</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded" id="inputAlamat" name="alamat" placeholder="Enter Address" required>
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
<!-- Content -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Tabel</h4>
                <div class="d-flex">
                    <div class="input-group" style="max-width: 250px;">
                        <input type="text" class="form-control" placeholder="Cari">
                        <button class="btn btn-success"><i class="fa fa-search"></i></button>
                    </div>
                    <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>TELEPON</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rizal</td>
                            <td>Gadobangkong</td>
                            <td>083116549766</td>
                            <td>
                                <button class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                    <i class="fa fa-edit"> Edit</i>
                                </button>
                                <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                    <i class="fa fa-trash"> Delete</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>John Doe</td>
                            <td>Gadobangkong</td>
                            <td>083116549766</td>
                            <td>
                            <button class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="fa fa-edit"> Edit</i>
                            </button>
                            <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="fa fa-trash"> Delete</i>
                            </button>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>
@endsection