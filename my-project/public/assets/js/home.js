const endpointsMap = {
    pelanggan: {
      getData: app_url + "/api/pelanggan/get-data",
      columns: ['nama', 'no_telp']
    },
    produk: {
      getData: app_url + "/api/produk/get-data",
      columns: ['nama_barang', 'stok']
    },
    user: {
      getData: app_url + "/api/user/get-data",
      columns: ['name', 'email']
    },
    transaksi: {
      getData: app_url + "/api/transaksi/get-data",
      columns: ['tanggal', 'pelanggan']
    }
  };
  
  const allTypes = ['pelanggan', 'produk', 'user', 'transaksi'];
  
  async function initAllTables() {
    JsLoadingOverlay.show({ "spinnerIcon": "ball-spin" });
  
    for (const type of allTypes) {
      await loadDataTable(type);
    }
    initCounter()
  
    JsLoadingOverlay.hide();
  }

  async function fetchData(url, options = {}) {
    options.headers = { 
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        };
    const response = await fetch(url, options);
    return response.json();
  }
  
  async function loadDataTable(type) {
    const response = await fetchData(endpointsMap[type].getData);
    const Data = response.data;
    const columns = endpointsMap[type].columns;
  
    // document.getElementById(`count-${type}`).textContent =
    //   `Showing ${Data.data.length} item(s)`;
  
    document.getElementById(`table-${type}`).innerHTML = Data.data.map((data, index) => `
      <tr>
      <td>${index + 1}</td>
      ${columns.map(col => `<td>${
        typeof data[col] === 'object' 
          ? data[col].nama
          : col.toLowerCase().includes('tanggal') || col.toLowerCase().includes('date') 
            ? new Date(data[col]).toLocaleDateString('en-GB') 
            : data[col]
      }</td>`).join("")}
    </tr>
  `).join("");
  }
  
  window.addEventListener('DOMContentLoaded', initAllTables);

  async function initCounter() {
    try {
      const response = await fetchData(app_url + '/api/other/get-counter');
      const data = response.data;
  
      document.getElementById('pelanggan-counter').textContent = data?.pelanggan ?? 0;
      document.getElementById('user-counter').textContent = data?.login ?? 0;
      document.getElementById('transaksi-counter').textContent = data?.transaksi ?? 0;
      document.getElementById('produk-counter').textContent = data?.produk ?? 0;
      
    } catch (error) {
      console.error('Failed to load counter data', error);
    }
  }
  