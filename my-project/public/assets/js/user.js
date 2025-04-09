if(!localStorage.getItem("token")){
  window.location.href= app_url+'/auth/login';
}

const endpoints = {
  getData: app_url+"/api/user/get-data",
  getLogin: app_url+"/api/user/get-login",
  searchData: app_url+"/api/user/search-data",
  addData: app_url+"/api/user/add-data",
  editData: app_url+"/api/user/edit-data/",
  showData: app_url+"/api/user/show-data/",
  deleteData: app_url+"/api/user/delete-data/",
};

let Data = [], itemsPerPage = 10, currentPage = 1, isFilter = false;
let LoginData = [], currentLoginPage = 1, isLoginFilter = false;;
//initialize
initialize()
async function initialize(){
  dataTable()
  dataLoginTable()
  // statusSelect()
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
      <td>${data.name}</td>
      <td>${data.email}</td>
      <td>${data.level_id == 2 ? 'Super Admin' : 'Admin'}</td>
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
            <td colspan="5" class="text-center">Tidak Ada Data</td>
        </tr>
    `;
  }
}

function edit(id) {
  fetchData(endpoints.showData + id).then(response => {
      const data = response.data;
      document.getElementById('edit-id').value = data['id'];
      document.getElementById('edit-name').value = data['name'];
      document.getElementById('edit-level').value = data['level_id'];
      document.getElementById('edit-email').value = data['email'];
      document.getElementById('edit-password').value = "";
      localStorage.setItem('data_id', id);
    });
  }
  
  function plus(){
    document.getElementById('add-name').value = "";
    document.getElementById('add-email').value = ""
    document.getElementById('add-password').value = "";
}
//Fungsi CRUD
async function update() {
  if(document.getElementById('edit-name').value == ""){
    toastr.error("Kolom nama tidak boleh kosong")
    return false
  }
  if(document.getElementById('edit-email').value == ""){
    toastr.error("Kolom email tidak boleh kosong")
    return false
  }
  const id = localStorage.getItem('data_id');
  await fetchData(endpoints.editData + document.getElementById('edit-id').value, { 
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      name: document.getElementById('edit-name').value,
      email: document.getElementById('edit-email').value,
      password: document.getElementById('edit-password').value,
      level: document.getElementById('edit-level').value,
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
            name: document.getElementById('add-name').value,
            email: document.getElementById('add-email').value,
            password: document.getElementById('add-password').value,
            level: document.getElementById('add-level').value,
          })
        }).then((response) => response.json())
        .then((response) => {
          JsLoadingOverlay.hide();
          toastr.success("Data berhasil ditambahkan");
          dataTable()
        });
}

async function LoginTable() {
  const response = await fetchData(endpoints.getLogin+"?page="+currentPage, {
    method: "GET", 
  });
  LoginData = response.data;
}



//Pagination
document.getElementById("prev-login").addEventListener("click", () => paginateLogin(-1));
document.getElementById("next-login").addEventListener("click", () => paginateLogin(1));
document.getElementById("last-login").addEventListener("click", () => changeLoginPage(Math.ceil(LoginData.total/itemsPerPage)));
document.getElementById("first-login").addEventListener("click", () => changeLoginPage(1));

function paginateLogin(direction) {
  currentLoginPage += direction;
  dataLoginTable();
}

function showLoginPagination() {
  const totalPages = Math.max(1, Math.ceil(LoginData.total/itemsPerPage));
  document.getElementById("first-login").style.display = currentLoginPage == 1 ? "none" : "block";
  document.getElementById("last-login").style.display = currentLoginPage == Math.ceil(LoginData.total/itemsPerPage) ? "none" : "block";
  document.getElementById("prev-login").style.display = currentLoginPage > 1 ? "block" : "none";
  document.getElementById("next-login").style.display = currentLoginPage < LoginData.total/itemsPerPage ? "block" : "none";
  document.getElementById("pagination-login").style.display = LoginData.total > 10 ? "block" : "none";
  
  let screenWidth = window.innerWidth;
  let visiblePages = screenWidth < 576 ? 1 : 7; // Jika layar kecil, tampilkan 3 tombol, jika besar, tampilkan 7 tombol

  let startPage = Math.max(1, currentPage - Math.floor(visiblePages / 2));
  let endPage = Math.min(totalPages, startPage + visiblePages - 1);

  if (endPage - startPage + 1 < visiblePages) {
    startPage = Math.max(1, endPage - visiblePages + 1);
  }

  let pages = Array.from({ length: endPage - startPage + 1 }, (_, i) => startPage + i)
    .map(page => `<button type="button" onclick="changeLoginPage(${page})" class="btn ${screenWidth < 576 ? 'btn-sm' : ''} ${page === currentLoginPage ? 'btn-primary' : 'btn-outline-primary'} rounded mx-1">${page}</button>`)
    .join("");

  
  document.getElementById("pagination-login").innerHTML = pages;
  if(screenWidth < 576){
    document.getElementById("first-login").classList.add("btn-sm");
    document.getElementById("last-login").classList.add("btn-sm");
    document.getElementById("next-login").classList.add("btn-sm");
    document.getElementById("prev-login").classList.add("btn-sm");
  }else{
    document.getElementById("first-login").className = "btn rounded btn-primary mx-2"
    document.getElementById("last-login").className = "btn rounded btn-primary mx-2"
    document.getElementById("next-login").className = "btn rounded btn-primary mx-2"
    document.getElementById("prev-login").className = "btn rounded btn-primary mx-2"
  }
}
window.addEventListener("resize", showLoginPagination);

function changeLoginPage(page) {
  currentLoginPage = page;
  paginateLogin(0);
}

//Tabel
async function dataLoginTable() {
  JsLoadingOverlay.show({ "spinnerIcon": "ball-spin" });
  await LoginTable();
  updateLoginTable();
  JsLoadingOverlay.hide();
}

function updateLoginTable() {
  const totalPages = Math.max(1, Math.ceil(LoginData.total/itemsPerPage));
  const startIndex = (currentPage - 1) * itemsPerPage;
  const currentItems = LoginData.data;
  
  showPagination();
  document.getElementById('count-login').textContent = `Page ${currentLoginPage} of ${totalPages} | Showing ${currentItems.length} item(s)`;
  document.getElementById('table-login').innerHTML = currentItems.map((data, index) => `
      <tr>
      <td>${index+1+startIndex}</td>
      <td>${data.user.name}</td>
      <td>${new Date(data.tanggal).toLocaleDateString('en-GB')}</td>
      <td>${data.ip}</td>
      </tr>
  `).join("");
  if (currentItems.length === 0) {
    document.getElementById('table-login').innerHTML = `
        <tr>
            <td colspan="4" class="text-center">Tidak Ada Data</td>
        </tr>
    `;
  }
}