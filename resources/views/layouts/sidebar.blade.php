<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <center>
      <a class="navbar-brand m-0 d-flex align-items-center" href="/dashboard">
        <img src="/assets/img/logo.png" style="width: 50px; height: 50px;" class="navbar-brand-img rounded-circle" alt="main_logo">
        <div class="ms-2 text-white text-center">
            <span class="font-weight-bold">NebllzCoffee</span> <br>
            <span class="font-weight-bold">Cashier</span>
        </div>
    </a>    
    </center>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link text-white" href="/dashboard">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                  </div>
                  <span class="nav-link-text ms-1">Dashboard</span>
              </a>
          </li>

          <!-- Menu Utama -->
          @if(auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#menu-utama-collapse" aria-expanded="false" aria-controls="menu-utama-collapse">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">menu</i>
                    </div>
                    <span class="nav-link-text ms-1">Menu Utama</span>
                </a>
                <!-- Sub-Menu dari Menu Utama -->
                <div class="collapse" id="menu-utama-collapse">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/user" style="{{ request()->is('user*') ? 'background-color: #e91e63;' : '' }}">
                                <i class="material-icons opacity-10">person</i>
                                <span class="nav-link-text ms-1">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/kategori" style="{{ request()->is('kategori*') ? 'background-color: #e91e63;' : '' }}">
                                <i class="material-icons opacity-10">ballot</i>
                                <span class="nav-link-text ms-1">Kategori</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/produk" style="{{ request()->is('produk*') ? 'background-color: #e91e63;' : '' }}">
                                <i class="material-icons opacity-10">store</i>
                                <span class="nav-link-text ms-1">Produk</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
          @endif
          {{-- End Menu Utama --}}
          
          <!-- Transaksi -->
          <li class="nav-item">
              <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi-collapse" aria-expanded="false" aria-controls="transaksi-collapse">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">wallet</i>
                  </div>
                  <span class="nav-link-text ms-1">Transaksi</span>
              </a>
              <!-- Sub-Menu dari Transaksi -->
              <div class="collapse" id="transaksi-collapse">
                  <ul class="nav ms-4">
                      <li class="nav-item">
                          <a class="nav-link text-white" href="/pelanggan" style="{{ request()->is('pelanggan*') ? 'background-color: #e91e63;' : '' }}">
                              <i class="material-icons opacity-10">baby_changing_station</i>
                              <span class="nav-link-text ms-1">Pelanggan</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link text-white " href="/penjualan" style="{{ request()->is('penjualan*') ? 'background-color: #e91e63;' : '' }}">
                              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                  <i class="material-icons opacity-10">shopping_cart</i>
                              </div>
                              <span class="nav-link-text ms-1">Penjualan</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          {{-- End Transaksi --}}
          
          <li class="nav-item">
              <a class="nav-link text-white" href="../pages/notifications.html">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">notifications</i>
                  </div>
                  <span class="nav-link-text ms-1">Notifications</span>
              </a>
          </li>
          
          <li class="nav-item mt-3">
              <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
          </li>
          
          <li class="nav-item">
              <a class="nav-link text-white" href="../pages/profile.html">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">person</i>
                  </div>
                  <span class="nav-link-text ms-1">Profile</span>
              </a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link text-white" href="/logout">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">login</i>
                  </div>
                  <span class="nav-link-text ms-1">Logout</span>
              </a>
          </li>
      </ul>
  </div>
</aside>
