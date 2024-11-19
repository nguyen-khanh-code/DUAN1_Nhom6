<!-- Header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản khách hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-6">
          <img src="<?php echo BASE_URL . $khachHang['anh_dai_dien']; ?>" 
              style="width: 70%" alt="Ảnh đại diện"
              onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010'">
      </div>
        <div class="col-6">
          <div class="container">
          <table class="table table-borderless">
            <tbody style="font-size: large;">
              <tr>
                <th>Họ tên:</th>
                <td><?= $khachHang['ho_ten'] ?? '' ?></td>
              </tr>

              <tr>
                <th>Ngày sinh:</th>
                <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
              </tr>

              <tr>
                <th>Email:</th>
                <td><?= $khachHang['email'] ?? '' ?></td>
              </tr>

              <tr>
                <th>Số điện thoại:</th>
                <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
              </tr>

              <tr>
                <th>Giới tính:</th>
                <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
              </tr>

              <tr>
                <th>Địa chỉ:</th>
                <td><?= $khachHang['dia_chi'] ?? '' ?></td>
              </tr>

              <tr>
                <th>Trạng thái:</th>
                <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
        <div class="col-12">
          <h2>Thông tin mua hàng</h2>
          <table class= "table table-bordered table-striped" >
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<?php 
// Sau khi hiển thị thông báo lỗi, bạn có thể xóa các lỗi trong session để tránh việc chúng hiển thị lại.
unset($_SESSION['error']);
?>
