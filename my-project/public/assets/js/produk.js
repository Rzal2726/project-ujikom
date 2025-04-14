if(!localStorage.getItem("token")){
    window.location.href= app_url+'/auth/login';
  }
  
  const endpoints = {
    getData: app_url+"/api/produk/get-data",
    searchData: app_url+"/api/produk/search-data",
    addData: app_url+"/api/produk/add-data",
    editData: app_url+"/api/produk/edit-data/",
    showData: app_url+"/api/produk/show-data/",
    deleteData: app_url+"/api/produk/delete-data/",
    getKategori: app_url+"/api/kategori/get-all",
  };
  
  let Data = [], itemsPerPage = 10, currentPage = 1, isFilter = false;
  //initialize
  initialize()
  async function initialize(){
    dataTable()
    kategoriSelect()
  }
  
  //Get Data dari Api
  async function fetchData(url, options = {}) {
    options.headers = { 
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        };
    const response = await fetch(url, options);
    return response.json();
  }
  
  async function kategoriSelect() {
    const response = await fetchData(endpoints.getKategori);
    const options = response.data.map(data => `<option value="${data.id}">${data.nama}</option>`).join("");
    document.getElementById('add-kategori').innerHTML = "<option>Pilih Kategori</option>" + options;
    document.getElementById('edit-kategori').innerHTML = "<option>Pilih Kategori</option>" + options;
  }
//   async function statusSelect() {
//     const response = await fetchData(endpoints.status);
//     const options = response.data.map(data => `<option value="${data.id}">${data.name}</option>`).join("");
//     document.getElementById('status').innerHTML = "<option value=''>Select a status</option>" + options;
//   }
  
  async function Table() {
    const response = await fetchData(endpoints.getData+"?page="+currentPage, {
      method: "GET", 
    });
    Data = response.data;
  }
  
  async function searchTable() {
    JsLoadingOverlay.show({ "spinnerIcon": "ball-spin" });
    const response = await fetchData(endpoints.searchData+"?page="+currentPage, {
        method: 'POST',
        body: JSON.stringify({ search: document.getElementById('search').value })
    });
    Data = response.data;
    !isFilter && (currentPage = 1);
    isFilter = true;
    updateTable();
    JsLoadingOverlay.hide();
  }
  
  
  //Pagination
  document.getElementById("prev").addEventListener("click", () => paginate(-1));
  document.getElementById("next").addEventListener("click", () => paginate(1));
  document.getElementById("last").addEventListener("click", () => changePage(Math.ceil(Data.total/itemsPerPage)));
  document.getElementById("first").addEventListener("click", () => changePage(1));
  
  function paginate(direction) {
    currentPage += direction;
    isFilter ? searchTable() : dataTable();
  }
  
  function showPagination() {
    const totalPages = Math.max(1, Math.ceil(Data.total/itemsPerPage));
    document.getElementById("first").style.display = currentPage == 1 ? "none" : "block";
    document.getElementById("last").style.display = currentPage == Math.ceil(Data.total/itemsPerPage) ? "none" : "block";
    document.getElementById("prev").style.display = currentPage > 1 ? "block" : "none";
    document.getElementById("next").style.display = currentPage < Data.total/itemsPerPage ? "block" : "none";
    document.getElementById("pagination").style.display = Data.total > 10 ? "block" : "none";
    
    let screenWidth = window.innerWidth;
    let visiblePages = screenWidth < 576 ? 1 : 7; // Jika layar kecil, tampilkan 3 tombol, jika besar, tampilkan 7 tombol
  
    let startPage = Math.max(1, currentPage - Math.floor(visiblePages / 2));
    let endPage = Math.min(totalPages, startPage + visiblePages - 1);
  
    if (endPage - startPage + 1 < visiblePages) {
      startPage = Math.max(1, endPage - visiblePages + 1);
    }
  
    let pages = Array.from({ length: endPage - startPage + 1 }, (_, i) => startPage + i)
      .map(page => `<button type="button" onclick="changePage(${page})" class="btn ${screenWidth < 576 ? 'btn-sm' : ''} ${page === currentPage ? 'btn-primary' : 'btn-outline-primary'} rounded mx-1">${page}</button>`)
      .join("");
  
    
    document.getElementById("pagination").innerHTML = pages;
    if(screenWidth < 576){
      document.getElementById("first").classList.add("btn-sm");
      document.getElementById("last").classList.add("btn-sm");
      document.getElementById("next").classList.add("btn-sm");
      document.getElementById("prev").classList.add("btn-sm");
    }else{
      document.getElementById("first").className = "btn rounded btn-primary mx-2"
      document.getElementById("last").className = "btn rounded btn-primary mx-2"
      document.getElementById("next").className = "btn rounded btn-primary mx-2"
      document.getElementById("prev").className = "btn rounded btn-primary mx-2"
    }
  }
  window.addEventListener("resize", showPagination);
  
  function changePage(page) {
    currentPage = page;
    paginate(0);
  }
  
  //Tabel
  async function dataTable() {
    JsLoadingOverlay.show({ "spinnerIcon": "ball-spin" });
    isFilter && (currentPage = 1);
    isFilter = false;
    await Table();
    updateTable();
    JsLoadingOverlay.hide();
  }
  
  function updateTable() {
    const totalPages = Math.max(1, Math.ceil(Data.total/itemsPerPage));
    const startIndex = (currentPage - 1) * itemsPerPage;
    const currentItems = Data.data;
    
    showPagination();
    document.getElementById('count').textContent = `Page ${currentPage} of ${totalPages} | Showing ${currentItems.length} item(s)`;
    document.getElementById('table').innerHTML = currentItems.map((data, index) => `
        <tr>
        <td>${index+1+startIndex}</td>
        <td>${data.nama_barang}</td>
        <td>${data.stok}</td>
        <td>Rp. ${ new Intl.NumberFormat().format(data.harga)}</td>
        <td>${data.kategori?.nama ?? '-'}</td>
            <td class="d-flex justify-content-center">
            <div class="d-flex gap-2">
              <button 
                class="btn text-nowrap btn-primary edit-btn" 
                onclick="edit(${data.id})"
                data-id="${data.id}" 
                data-bs-toggle="modal" 
                data-bs-target="#modalEdit">
                <i class="fa fa-pencil"></i> Edit
              </button>

              <button 
                class="btn text-nowrap btn-danger delete-btn" 
                onclick="del(${data.id})"
                data-id="${data.id}">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </div>
            </td>
        </tr>
    `).join("");
    if (currentItems.length === 0) {
      document.getElementById('table').innerHTML = `
          <tr>
              <td colspan="6" class="text-center">Tidak Ada Data</td>
          </tr>
      `;
    }
  }
  
  function edit(id) {
    fetchData(endpoints.showData + id).then(response => {
        const data = response.data;
        document.getElementById('edit-id').value = data['id'];
        document.getElementById('edit-nama').value = data['nama_barang'];
        document.getElementById('edit-stok').value = data['stok'];
        document.getElementById('edit-harga').value = data['harga'];
        $('#edit-kategori').val(data['id_kategori']).trigger('change');;
        localStorage.setItem('data_id', id);
      });
    }
    
    function plus(){
      document.getElementById('add-nama').value = "";
      document.getElementById('add-stok').value = ""
      document.getElementById('add-harga').value = "";
      $('#add-kategori').val("").trigger('change');;
  }
  //Fungsi CRUD
  async function update() {
    if(document.getElementById('edit-nama').value == ""){
      toastr.error("Kolom nama barang tidak boleh kosong")
      return false
    }
    if(document.getElementById('edit-stok').value == ""){
      toastr.error("Kolom stok tidak boleh kosong")
      return false
    }
    if(document.getElementById('edit-harga').value == ""){
      toastr.error("Kolom harga tidak boleh kosong")
      return false
    }
    if(document.getElementById('edit-kategori').value == ""){
      toastr.error("Kolom kategori tidak boleh kosong")
      return false
    }
    const id = localStorage.getItem('data_id');
    await fetchData(endpoints.editData + document.getElementById('edit-id').value, { 
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        nama_barang: document.getElementById('edit-nama').value,
        stok: document.getElementById('edit-stok').value,
        harga: document.getElementById('edit-harga').value,
        kategori: document.getElementById('edit-kategori').value,
    }) });
    toastr.success("Data successfully updated");
    dataTable();
  }
  
  
  function del(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then(async (result) => {
        if (result.isConfirmed) {
            await fetchData(endpoints.deleteData + id, { method: 'DELETE' });
            toastr.success("Data successfully deleted");
            dataTable();
        }
    });
  }
  
  async function add(){
    if(document.getElementById('add-nama').value == ""){
      toastr.error("Kolom nama barang tidak boleh kosong")
      return false
    }
    if(document.getElementById('add-stok').value == ""){
      toastr.error("Kolom stok tidak boleh kosong")
      return false
    }
    if(document.getElementById('add-harga').value == ""){
      toastr.error("Kolom harga tidak boleh kosong")
      return false
    }
    if(document.getElementById('add-kategori').value == ""){
      toastr.error("Kolom kategori tidak boleh kosong")
      return false
    }
    JsLoadingOverlay.show({
      "spinnerIcon": "ball-spin"
    });
          fetch(endpoints.addData, {
            method: 'POST',
            headers : {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer '+localStorage.getItem('token') },
            body: JSON.stringify({
              nama_barang: document.getElementById('add-nama').value,
              stok: document.getElementById('add-stok').value,
              harga: document.getElementById('add-harga').value,
              kategori: document.getElementById('add-kategori').value,
            })
          }).then((response) => response.json())
          .then((response) => {
            JsLoadingOverlay.hide();
            toastr.success("Data berhasil ditambahkan");
            dataTable()
          });
  }