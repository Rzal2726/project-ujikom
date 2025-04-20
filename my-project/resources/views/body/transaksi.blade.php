@extends('welcome')
@section('navbar')
    @extends('header.navbar')
@endsection

@section('modal')

<!-- Edit Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="inputId" class="form-label fw-semibold">ID</label>
                        <input type="text" class="form-control rounded" id="detail-id" name="id" placeholder="Enter ID" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Pelanggan</label>
                        <input type="text" class="form-control rounded" id="detail-pelanggan" name="name" placeholder="Enter Name" readonly> 
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Admin*</label>
                        <input type="text" class="form-control rounded" id="detail-admin" name="alamat" placeholder="Enter Address" readonly>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Harga*</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-white">RP.</span>
                            <input type="number" class="form-control border-start-0" id="detail-harga" name="no_hp" placeholder="Enter Price ( Examplpe: 5000 )" maxlength="11" required>
                        </div>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Tanggal*</label>
                        <input type="text" class="form-control rounded" id="detail-tanggal" name="alamat" placeholder="Enter Address" readonly>
                    </div>     
                    <div class="mb-3">
                        <label for="" class="form-label">Daftar Produk</label>
                        <textarea class="form-control" name="" id="detail-produk" rows="3" readonly></textarea>
                    </div>
                    
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalProduk" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="inputName" class="form-label fw-semibold">Nama Barang</label>
                        <input type="text" class="form-control rounded" id="barang-nama" name="name" placeholder="Enter Name" readonly> 
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control rounded" id="barang-stok" name="alamat" placeholder="Enter Address" readonly>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-white">RP.</span>
                            <input type="number" class="form-control border-start-0" id="barang-harga" name="no_hp" placeholder="Enter Price ( Examplpe: 5000 )" maxlength="11" required>
                        </div>
                    </div>     
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control rounded" id="barang-kategori" name="alamat" placeholder="Enter Address" readonly>
                    </div>     
                    <div class="mb-3">
                        <label for="" class="form-label">Gambar</label>
                        <div id="barang-img"></div>
                    </div>
                    
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalEkspor" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Ekspor Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Awal</label>
                        <input
                            type="date"
                            class="form-control"
                            name=""
                            id="startdate"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Akhir</label>
                        <input
                            type="date"
                            class="form-control"
                            name=""
                            id="enddate"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    
                    
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" onclick="exportPdf()" data-bs-dismiss="modal">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modalFilter" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
    aria-labelledby="modalTitleId" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            
            <!-- Modal Header -->
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title fw-bold" id="modalTitleId">Filter Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Form -->
            <form>
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Awal</label>
                        <input
                            type="date"
                            class="form-control"
                            name=""
                            id="startdate-filter"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal Akhir</label>
                        <input
                            type="date"
                            class="form-control"
                            name=""
                            id="enddate-filter"
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    
                    
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4" onclick="searchTable()" data-bs-dismiss="modal">Filter</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('content')
<style>
    #produk-container {
        max-height: 480px; /* Set your desired max height */
        overflow-y: auto;
    }

    #produk-card .glass-table {
        min-width: 600px;   /* adjust for horizontal scroll */
        max-height: 240px;   /* adjust for horizontal scroll */
        table-layout: fixed;
        width: 100%;
        height: 100%;
    }

    #produk-card .glass-table th,
    #produk-card .glass-table td {
        word-wrap: break-word;
        white-space: nowrap;
        padding: 0.75rem;
    }


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
    <div class="container my-5">
        <div class="card shadow border-0" id="draggable-card">
            <div class="card-header bg-light p-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="mb-0">Buat Transaksi</h4>
                </div>
            </div>
    
            <div class="card-body">
                <div class="row g-4">
                    <!-- Produk Table -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 p-3 h-100 d-flex justify-content-center row">
                            <div class="input-group border-bottom rounded col-12" style=" width: 100%;">
                                <input type="text" id="search-produk" class="form-control rounded-start border-0" placeholder="Cari Produk">
                                <button class="btn btn-success rounded-end" onclick="searchProdukTable()">
                                  <i class="fa fa-search"></i>
                                </button>
                              </div>
                            <div class="glass-table-container m-2 col-12" id="produk-container">
                                <table class="glass-table text-center" id="produk-card">
                                    <thead class="table-primary w-50">
                                        <tr>
                                            <th style="width:10%;">NO</th>
                                            <th style="width:30%;">PRODUK</th>
                                            <th style="width:20%;">HARGA</th>
                                            <th style="width:20%;">STOK</th>
                                            <th style="width:20%;">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-barang-transaksi"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    
                    <!-- Form Input -->
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0 p-4 h-100">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Daftar Produk</label>
                                    <textarea class="form-control" id="add-daftar-produk" rows="3" readonly></textarea>
                                </div>
    
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Pelanggan</label>
                                    <select class="form-select select2" id="add-pelanggan">
                                        <option value="">Select one</option>
                                    </select>
                                </div>
    
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Harga*</label>
                                    <input type="text" class="form-control" id="total-harga" placeholder="Auto Price" readonly>
                                </div>
    
                                <div class="mb-3" id="tgl-input">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <input type="date" class="form-control" id="form-tanggal" required>
                                </div>
    
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="reset" class="btn btn-outline-secondary rounded-pill px-4" onclick="cartReset()">Reset</button>
                                    <button type="button" class="btn btn-primary rounded-pill px-4" id="save-btn" onclick="sendTransaction()">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<div class="container my-4">
    <div class="card shadow border-0 my-4 " id="draggable-card2">
        <div class="card-header bg-light p-4">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-8 text-center text-md-start">
                    <h4 class="mb-0 text-nowrap">Riwayat Transaksi</h4>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-end align-items-center gap-2">
                      
                      <!-- Search Input -->
                      <div class="input-group border rounded-pill" style="max-width: 250px; width: 100%;">
                        <input type="text" id="search" class="form-control rounded-start-pill border-0" placeholder="Cari Data Transaksi">
                        <button class="btn btn-success rounded-end-pill" onclick="searchTable()">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                  
                      <!-- Export Button -->
                      <button class="btn btn-primary rounded-pill text-nowrap" data-bs-toggle="modal" data-bs-target="#modalFilter">
                        <i class="fa fa-list"></i> Filter
                      </button>
                      <button class="btn btn-success rounded-pill text-nowrap" data-bs-toggle="modal" data-bs-target="#modalEkspor">
                        <i class="fa fa-file"></i> Ekspor
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
                            <th class="w-15">PELANGGAN</th>
                            <th class="w-15">ADMIN</th>
                            <th class="w-20">DAFTAR PRODUK</th>
                            <th class="w-15">TANGGAL</th>
                            <th class="w-15">HARGA</th>
                            <th class="w-10">AKSI</th>
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

@endsection
@section('script')
<!-- jQuery + jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    $('#edit-no').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    });
    $(function() {
    // Select2 Initialization
    $("#add-pelanggan").select2({
        placeholder: "Select a user",
        theme: "bootstrap4",
    });

    // Draggable & Resizable Cards
    function makeDraggableResizable(id) {
        $(id).draggable({
            handle: ".card-header",
            containment: ".wrapper"
        }).resizable({
            minHeight: 150,
            minWidth: 200
        });
    }

    makeDraggableResizable("#draggable-card");
    makeDraggableResizable("#draggable-card2");
});

</script>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Bootstrap Modal Test:", bootstrap?.Modal ? "Loaded" : "Not Loaded");
    });
</script>
<script src="{{asset("/assets/js/transaksi.js")}}" defer></script>
@endsection
