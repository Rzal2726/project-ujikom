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
                        <input type="text" class="form-control rounded" id="add-name" name="name" placeholder="Enter Name" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Email*</label>
                        <input type="email" class="form-control rounded" id="add-email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Level</label>
                        <select
                            class="form-select"
                            name=""
                            id="add-level"
                        >
                            <option selected value="1">Admin</option>
                            <option value="2">Super Admin</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Password*</label>
                        <input type="password" class="form-control rounded" id="add-password" name="alamat" placeholder="Enter Password" required>
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
                        <input type="text" class="form-control rounded" id="edit-name" name="name" placeholder="Enter Name" required autofocus> 
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Email*</label>
                        <input type="email" class="form-control rounded" id="edit-email" name="alamat" placeholder="Enter Email" required>
                    </div>     
                    <div class="mb-3">
                        <label for="" class="form-label">Level</label>
                        <select
                            class="form-select"
                            name=""
                            id="edit-level"
                        >
                            <option selected value="1">Admin</option>
                            <option value="2">Super Admin</option>
                        </select>
                    </div> 
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" onclick="update()" data-bs-dismiss="modal">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalEditPass" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3 d-none">
                        <label for="inputId" class="form-label fw-semibold">ID</label>
                        <input type="text" class="form-control rounded" id="password-id" name="id" placeholder="Enter ID" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Password Lama*</label>
                        <div class="input-group">
                            <input type="password" class="form-control border-0 border-bottom rounded-0" id="password-lama" placeholder="Enter your password" required>
                            <span class="input-group-text bg-transparent border-0 border-bottom rounded-0" onclick="togglePassword('password-lama','togglePasswordIconLama')" style="cursor: pointer;">
                                <i id="togglePasswordIconLama" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Password Baru*</label>
                        <div class="input-group">
                            <input type="password" class="form-control border-0 border-bottom rounded-0" id="password-baru" placeholder="Enter your password" required>
                            <span class="input-group-text bg-transparent border-0 border-bottom rounded-0" onclick="togglePassword('password-baru','togglePasswordIconBaru')" style="cursor: pointer;">
                                <i id="togglePasswordIconBaru" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>     
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" onclick="updatePass()" data-bs-dismiss="modal">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('content')
<style>
    /* Glass Container */
    .glass-table-container {
        padding: 2rem;
        background: #f2f4f7;
        border-radius: 16px;
        overflow-x: auto;
    }
    
    /* Responsive Table */
    .glass-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
        min-width: 600px;
    }
    
    /* Table Head */
    .glass-table thead th {
        color: #555;
        text-transform: uppercase;
        font-weight: 600;
        text-align: center;
        padding-bottom: 1rem;
        white-space: nowrap;
    }
    
    /* Table Body */
    .glass-table tbody tr {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .glass-table tbody tr:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.1);
    }
    
    /* Table Cell */
    .glass-table td {
        padding: 1rem 1.5rem;
        text-align: center;
        font-weight: 500;
        color: #333;
        white-space: nowrap;
    }
    
    /* Action Button Style */
    .action-btn {
        border: none;
        padding: 8px 12px;
        margin: 0 2px;
        border-radius: 10px;
        color: white;
        font-size: 14px;
        transition: background 0.3s;
    }
    
    .btn-edit {
        background: #4caf50;
    }
    .btn-edit:hover {
        background: #45a049;
    }
    
    .btn-delete {
        background: #e74c3c;
    }
    .btn-delete:hover {
        background: #c0392b;
    }
    
    
    /* Input Field Glass */
    .input-group input {
        background: rgba(255, 255, 255, 0.6);
        border: none;
        color: #333;
    }
    
    /* Pagination Glass */
    #pagination button {
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .glass-table-container {
            padding: 1rem;
        }
    
        .glass-table {
            min-width: unset;
            font-size: 14px;
        }
    
        .glass-table td, .glass-table th {
            padding: 0.5rem 0.8rem;
        }
    
        .action-btn {
            padding: 6px 8px;
            font-size: 12px;
        }
    
        #pagination button {
            padding: 6px 10px;
            font-size: 12px;
        }
    }
    </style>
    
<div class="container my-4">
    <div class="card shadow border-0 my-4 " id="draggable-card">
        <div class="card-header bg-light p-4">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-8 text-center text-md-start">
                    <h4 class="mb-0 text-nowrap">Data User</h4>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-2">
                        <div class="input-group border rounded-pill" style="max-width: 250px; width: 100%;">
                            <input type="text" id="search" class="form-control rounded-start-pill border-0" placeholder="Cari Data User">
                            <button class="btn btn-success rounded-end-pill" onclick="searchTable()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
        
                        <button class="btn btn-primary rounded w-auto" onclick="plus()" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Table -->
            <div class="glass-table-container">
                <table class="glass-table">
                    <thead class="table-primary">
                        <tr>
                            <th class="w-10">NO</th>
                            <th class="w-35">NAMA</th>
                            <th class="w-35">EMAIL</th>
                            <th class="w-35">LEVEL</th>
                            <th class="w-20">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                    </tbody>
                </table>
            </div>
            <div class="container d-flex flex-column justify-content-center align-items-center m-1">
                <div class="container d-flex flex-row justify-content-center align-items-center m-2">
                  <button type="button" class="btn rounded btn-primary mx-2" id="first">First</button>
                  <button type="button" class="btn rounded btn-primary mx-2" id="prev"><</button>
                  <div class="" id="pagination">
                  </div>
                  <button type="button" class="btn rounded btn-primary mx-2" id="next">></button>
                  <button type="button" class="btn rounded btn-primary mx-2" id="last">Last</button>
                </div>
                <div id="count"></div>
              </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="card shadow border-0 my-4 " id="draggable-card2">
        <div class="card-header bg-light p-4">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-8 text-center text-md-start">
                    <h4 class="mb-0 text-nowrap">Riwayat Login</h4>
                </div>
                <div class="col-12 col-md-4">
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Table -->
            <div class="glass-table-container">
                <table class="glass-table">
                    <thead class="table-primary">
                        <tr>
                            <th class="w-10">NO</th>
                            <th class="w-35">NAMA</th>
                            <th class="w-35">TANGGAL</th>
                            <th class="w-20">IP</th>
                        </tr>
                    </thead>
                    <tbody id="table-login">
                    </tbody>
                </table>
            </div>
            <div class="container d-flex flex-column justify-content-center align-items-center m-1">
                <div class="container d-flex flex-row justify-content-center align-items-center m-2">
                  <button type="button" class="btn rounded btn-primary mx-2" id="first-login">First</button>
                  <button type="button" class="btn rounded btn-primary mx-2" id="prev-login"><</button>
                  <div class="" id="pagination-login">
                  </div>
                  <button type="button" class="btn rounded btn-primary mx-2" id="next-login">></button>
                  <button type="button" class="btn rounded btn-primary mx-2" id="last-login">Last</button>
                </div>
                <div id="count-login"></div>
              </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- jQuery + jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    $('#edit-no').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    });
    function togglePassword(id, id2) {
    const passwordInput = document.getElementById(id);
    const toggleIcon = document.getElementById(id2);
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
    $(function() {
        $("#draggable-card").draggable({
            handle: ".card-header", // only drag from header
            containment: ".wrapper"
        }).resizable({
            minHeight: 150,
            minWidth: 200
        });
    });
    $(function() {
        $("#draggable-card2").draggable({
            handle: ".card-header", // only drag from header
            containment: ".wrapper"
        }).resizable({
            minHeight: 150,
            minWidth: 200
        });
    });
</script>
<script src="{{asset("/assets/js/user.js")}}" defer></script>
@endsection
