<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img  src="./assets/dist/img/LOGO.png" alt="AdminLTE Logo"  style="opacity: .8; width:50px;height:40px;" >
      <span class="brand-text font-weight-light">ADMIN 4BRO Sneaker</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010' class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['user_name'] ?></a>
          </div>
       </div>



      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?act=danh-muc" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lí danh mục
              </p>
            </a>
          <li class="nav-item">
            <a href="?act=san-pham" class="nav-link">
            <i class="fa-solid fa-box-open"></i>
              <p>
                Quản lí sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?act=don-hang" class="nav-link">
            <!-- <i class="nav-icon fas fa-file-invoice-dollar"></i> -->
            <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>

          <li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-users-cog"></i> <!-- Thay đổi icon tại đây -->
        <p>
            Quản lý tài khoản
        </p>
        <i class="fas fa-angle-left right"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="?act=list-tai-khoan-quan-tri" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Tài khoản quản trị
                </p>
            </a>
        </li>

        <li class="nav-item">
        <a href="?act=list-tai-khoan-khach-hang" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Tài khoản khách hàng
                </p>
            </a>
        </li> 
        <li class="nav-item">
            <a href="?act=form-sua-thong-tin-ca-nhan-quan-tri" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Tài khoản cá nhân
                </p>
            </a>
        </li>

    </ul>
    <li class="nav-item">
            <a href="?act=list-ma-giam-gia" class="nav-link">
            <!-- <i class="nav-icon fas fa-file-invoice-dollar"></i> -->
            <i class="fa-solid fa-cart-shopping"></i>
              <p>
                Mã giảm giá
              </p>
            </a>
          </li>

</li>







          
          </li>         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>