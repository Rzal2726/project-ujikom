if(!localStorage.getItem("token")){
    window.location.href= app_url+'/auth/login';
  }
  
  const endpoints = {
    getData: app_url+"/api/transaksi/get-data",
    searchData: app_url+"/api/transaksi/search-data",
    addData: app_url+"/api/transaksi/add-data",
    editData: app_url+"/api/transaksi/edit-data/",
    showData: app_url+"/api/transaksi/show-data/",
    deleteData: app_url+"/api/transaksi/delete-data/",
    getProduk: app_url+"/api/produk/get-data",
    updateStok: app_url+"/api/produk/update-stok",
    getPelanggan: app_url+"/api/pelanggan/get-all"
  };
  
  let Data = [], itemsPerPage = 10, currentPage = 1, isFilter = false;
  let DataProduk = [], currentProdukPage = 1;
  let cart = {};
  //initialize
  initialize()
  async function initialize(){
    dataTable()
    userSelect()
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
  
  async function userSelect() {
    const response = await fetchData(endpoints.getPelanggan);
    const options = response.data.map(data => `<option value="${data.id}">${data.nama}</option>`).join("");
    document.getElementById('add-pelanggan').innerHTML = "<option></option>" + options;
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

  async function ProdukTable() {
    const response = await fetchData(endpoints.getProduk+"?page="+currentPage, {
      method: "GET", 
    });
    DataProduk = response.data;
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
    await ProdukTable();
    updateTable();
    updateProdukTable();
    JsLoadingOverlay.hide();
  }
  
  function updateTable() {
    const totalPages = Math.max(1, Math.ceil(Data.total/itemsPerPage));
    const startIndex = (currentPage - 1) * itemsPerPage;
    const currentItems = Data.data;
    
    showPagination();
    console.log(currentItems)
    document.getElementById('count').textContent = `Page ${currentPage} of ${totalPages} | Showing ${currentItems.length} item(s)`;
    document.getElementById('table').innerHTML = currentItems.map((data, index) => `
        <tr>
        <td>${index+1+startIndex}</td>
        <td>${data.pelanggan?.nama ?? 'Guest'}</td>
        <td>${data.user['name'] ?? '-'}</td>
        <td>${data.daftar_produk.slice(0, 20)}</td>
        <td>${new Date(data.tanggal).toLocaleDateString('en-GB')}</td>
        <td>Rp. ${ new Intl.NumberFormat().format(data.harga)}</td>
        <td class="d-flex justify-content-center">
            <div class="d-flex gap-2">
              <button 
                class="btn text-nowrap btn-primary edit-btn" 
                onclick="edit(${data.id})"
                data-id="${data.id}" 
                data-bs-toggle="modal" 
                data-bs-target="#modalEdit">
                <i class="fa fa-info"></i> Detail
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
              <td colspan="7" class="text-center">Tidak Ada Data</td>
          </tr>
      `;
    }
  }

  function updateProdukTable() {
    const totalPages = Math.max(1, Math.ceil(DataProduk.total/itemsPerPage));
    const startIndex = (currentPage - 1) * itemsPerPage;
    const currentItems = DataProduk.data;
    
    console.log(currentItems)
    document.getElementById('add-barang-transaksi').innerHTML = currentItems.map((data, index) => `
        <tr>
        <td>${index+1+startIndex}</td>
        <td>${data.nama_barang}</td>
        <td>${data.harga}</td>
        <td>${data.stok}</td>
        <td class="d-flex justify-content-center">
            <div class="d-flex gap-2">
              <button 
                class="btn text-nowrap btn-primary delete-btn " 
                onclick="addToCart(${data.id}, '${data.nama_barang}', ${data.harga}, ${data.stok})"
                ${data.stok < 1 ? ' disabled ' : ''}
                id="plus-${data.id}">
                <i class="fa fa-plus"></i>
              </button>

              <button 
                class="btn text-nowrap btn-danger delete-btn" 
                onclick="decreaseCart(${data.id})"
                id="minus-${data.id}" disabled>
                <i class="fa fa-minus"></i>
              </button>
            </div>
            </td>
        </tr>
    `).join("");
    if (currentItems.length === 0) {
      document.getElementById('add-barang-transaksi').innerHTML = `
          <tr>
              <td colspan="5" class="text-center">Tidak Ada Data</td>
          </tr>
      `;
    }
  }
  
  function edit(id) {
    fetchData(endpoints.showData + id).then(response => {
        const data = response.data;
        console.log(data)
        document.getElementById('detail-id').value = data['id'];
        document.getElementById('detail-pelanggan').value = data['pelanggan']['nama'];
        document.getElementById('detail-admin').value = data['user']['name'];
        document.getElementById('detail-harga').value = data['harga'];
        document.getElementById('detail-tanggal').value = data['tanggal'];
        document.getElementById('detail-produk').value = data['daftar_produk'];
        localStorage.setItem('data_id', id);
      });
    }
    
    function plus(){
      document.getElementById('add-nama').value = "";
      document.getElementById('add-alamat').value = ""
      document.getElementById('add-no').value = "";
  }
  //Fungsi CRUD
  async function update() {
    if(document.getElementById('edit-nama').value == ""){
      toastr.error("Kolom nama tidak boleh kosong")
      return false
    }
    if(document.getElementById('edit-alamat').value == ""){
      toastr.error("Kolom alamat tidak boleh kosong")
      return false
    }
    if(document.getElementById('edit-no').value == ""){
      toastr.error("Kolom notelp tidak boleh kosong")
      return false
    }
    const id = localStorage.getItem('data_id');
    await fetchData(endpoints.editData + document.getElementById('edit-id').value, { 
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        name: document.getElementById('edit-nama').value,
        alamat: document.getElementById('edit-alamat').value,
        no_telp: document.getElementById('edit-no').value,
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
    JsLoadingOverlay.show({
      "spinnerIcon": "ball-spin"
    });
          fetch(endpoints.addData, {
            method: 'POST',
            headers : {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer '+localStorage.getItem('token') },
            body: JSON.stringify({
              name: document.getElementById('add-nama').value,
              alamat: document.getElementById('add-alamat').value,
              no_telp: document.getElementById('add-no').value,
            })
          }).then((response) => response.json())
          .then((response) => {
            JsLoadingOverlay.hide();
            toastr.success("Data berhasil ditambahkan");
            dataTable()
          });
  }



  function addToCart(id, name, price, stock) {
    if (cart[id]) {
        if (cart[id].qty < stock) {
            cart[id].qty += 1;
            cart[id].total = cart[id].qty * price;
        }
    } else {
        cart[id] = {
            name: name,
            price: price,
            qty: 1,
            total: price,
            stock: stock
        };
    }
    renderCart();
    toggleButton(id);
}

function decreaseCart(id) {
    if (cart[id]) {
        cart[id].qty -= 1;
        cart[id].total = cart[id].qty * cart[id].price;
        if (cart[id].qty <= 0) {
            delete cart[id];
        }
    }
    renderCart();
    toggleButton(id);
}

function toggleButton(id) {
    const plusBtn = document.getElementById(`plus-${id}`);
    const minusBtn = document.getElementById(`minus-${id}`);
    const item = cart[id];

    if (item) {
        plusBtn.disabled = item.qty >= item.stock;
        minusBtn.disabled = item.qty <= 0;
    } else {
        plusBtn.disabled = false;
        minusBtn.disabled = true;
    }
}
  
  function renderCart() {
      let output = '';
  
      for (const id in cart) {
          const item = cart[id];
          output += `${item.name} | Qty: ${item.qty} | Harga: ${formatRupiah(item.price)} | Total: ${formatRupiah(item.total)}\n`;
      }
  
      document.getElementById('add-daftar-produk').value = output || 'Keranjang kosong';
      updateTotalPrice()
  }
  
  function formatRupiah(angka) {
      return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function updateTotalPrice() {
    let totalPrice = 0;

    for (const id in cart) {
        totalPrice += cart[id].total;
    }

    document.getElementById('total-harga').value = totalPrice;
}
  
async function saveTransaction() {
  
  JsLoadingOverlay.show({
    "spinnerIcon": "ball-spin"
  });
  try {
      const response = await fetch(endpoints.addData, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + localStorage.getItem('token'),
          },
          body: JSON.stringify({ 
            harga: document.getElementById('total-harga').value,
            daftar_produk: document.getElementById('add-daftar-produk').value,
            tanggal: document.getElementById('form-tanggal').value,
            id_pelanggan: document.getElementById('add-pelanggan').value ?? '',
           })
      });

      if (!response.ok) throw new Error('Failed to update');

      const result = await response.json();

      toastr.success('Success update transaction data')
      dataTable()

  } catch (error) {
    toastr.error('Failed to update transaction data!', error)
  } finally {
    JsLoadingOverlay.hide()
  }
}

async function saveCart() {
  JsLoadingOverlay.show({
    "spinnerIcon": "ball-spin"
  });
  try {
      const response = await fetch(endpoints.updateStok, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + localStorage.getItem('token'),
          },
          body: JSON.stringify({ cart: cart })
      });

      if (!response.ok) throw new Error('Failed to update');

      const result = await response.json();

      toastr.success('Success update products stok')
      updateProdukTable()

  } catch (error) {
    toastr.error('Failed to update stock!', error)
  } finally {
    JsLoadingOverlay.hide()
  }
}

async function sendTransaction(){
  if(document.getElementById('total-harga').value == ""){
    toastr.error("Kolom harga tidak boleh kosong")
    return false
  }
  if(document.getElementById('add-daftar-produk').value == ""){
    toastr.error("Kolom daftar produk tidak boleh kosong")
    return false
  }
  if(document.getElementById('form-tanggal').value == ""){
    toastr.error("Kolom tanggal tidak boleh kosong")
    return false
  }
  await saveTransaction()
  await saveCart()
  document.getElementById("table").scrollIntoView({
    behavior: "smooth"  // pakai "auto" kalau mau tanpa animasi
});
}

function cartReset(){
  cart = {}
  document.getElementById('total-harga').value = ""
}

function exportExcel() {
  fetch(app_url + '/api/transaksi/excel', {
    headers: {
      'Authorization': 'Bearer ' + localStorage.getItem('token'),
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Failed to export file');
    }
    return response.blob();
  })
  .then(blob => {
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'data-transaksi.xlsx';
    document.body.appendChild(a);
    a.click();
    a.remove();
  })
  .catch(error => {
    console.error('Error exporting file:', error);
  });
}