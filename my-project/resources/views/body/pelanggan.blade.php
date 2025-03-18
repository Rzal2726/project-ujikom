@extends('welcome')
@section('navbar')
    @extends('header.navbar')
@endsection

@section('modal')
    
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div
        class="modal fade"
        id="modalId"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        
        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Tambah Data
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">ID</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                    </div>     
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
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

@section('content')
<div class="m-2">
    <div class="card bg-white">
        <div class="m-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4>Tabel</h4>
                <div class="d-flex gap-2">
                    <!-- Search Input + Button -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!-- Add Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <div class="table-responsive" >
                <table class="table rounded">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">No Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">1</td>
                            <td>Rizal</td>
                            <td>Gadobangkong</td>
                            <td>083116549766</td>
                        </tr>
                        <tr class="">
                            <td scope="row">2</td>
                            <td>John Doe</td>
                            <td>Gadobangkong</td>
                            <td>083116549766</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection