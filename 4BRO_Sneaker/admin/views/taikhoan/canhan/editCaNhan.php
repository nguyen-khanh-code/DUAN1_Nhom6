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
          <h1>Quản lý tài khoản cá nhân</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main Content -->
  <section class="content">
  <div class="container">
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?= BASE_URL_ADMIN . $thongTin['anh_dai_dien']; ?>"  style="width: 100px" class="avatar img-circle" alt="avatar" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010' ">
          <h6 class="mt-2">Họ tên: <?= $thongTin['ho_ten'] ?> </h6>
          
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      <?php if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              <?= $_SESSION['success']; ?>
          </div>
          <?php 
          // Xóa thông báo khỏi session sau khi hiển thị
          unset($_SESSION['success']);
          ?>
      <?php } ?>

      <form method="POST" action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri' ?>">
    <input type="hidden" name="quan_tri_id" value="<?= isset($thongTin['id']) ? htmlspecialchars($thongTin['id'], ENT_QUOTES, 'UTF-8') : ''; ?>">

    <div class="card-body">
        <!-- Họ tên -->
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" 
                   value="<?= isset($thongTin['ho_ten']) ? htmlspecialchars($thongTin['ho_ten'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập họ tên">
            <?php if (isset($_SESSION['error']['ho_ten'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
            <?php } ?>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" 
                   value="<?= isset($thongTin['email']) ? htmlspecialchars($thongTin['email'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập email">
            <?php if (isset($_SESSION['error']['email'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
            <?php } ?>
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" 
                   value="<?= isset($thongTin['so_dien_thoai']) ? htmlspecialchars($thongTin['so_dien_thoai'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập số điện thoại">
            <?php if (isset($_SESSION['error']['so_dien_thoai'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
            <?php } ?>
        </div>

        <!-- Ngày sinh -->
        <div class="form-group">
            <label>Ngày sinh</label>
            <input type="date" class="form-control" name="ngay_sinh" 
                   value="<?= isset($thongTin['ngay_sinh']) ? htmlspecialchars($thongTin['ngay_sinh'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập ngày sinh">
            <?php if (isset($_SESSION['error']['ngay_sinh'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
            <?php } ?>
        </div>

        <!-- Giới tính -->
        <div class="form-group">
            <label>Giới tính</label>
            <select name="gioi_tinh" id="inputStatus" class="form-control custom-select">
                <option <?= isset($thongTin['gioi_tinh']) && $thongTin['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                <option <?= isset($thongTin['gioi_tinh']) && $thongTin['gioi_tinh'] != 1 ? 'selected' : '' ?> value="2">Nữ</option>
            </select>
        </div>

        <!-- Địa chỉ -->
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="dia_chi" 
                   value="<?= isset($thongTin['dia_chi']) ? htmlspecialchars($thongTin['dia_chi'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập địa chỉ">
            <?php if (isset($_SESSION['error']['dia_chi'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
            <?php } ?>
        </div>

        <!-- Trạng thái tài khoản -->
        <div class="form-group">
            <label for="inputStatus">Trạng thái tài khoản</label>
            <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                <option <?= isset($thongTin['trang_thai']) && $thongTin['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= isset($thongTin['trang_thai']) && $thongTin['trang_thai'] != 1 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-12">
              <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
            </div>
          </div>
    </div>
    
    <!-- /.card-body -->

    
</form>



          <hr>
          <h3>Đổi mật khẩu</h3>
          <?php if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
              <?= $_SESSION['success']; ?>
          </div>
          <?php 
          // Xóa thông báo khỏi session sau khi hiển thị
          unset($_SESSION['success']);
          ?>
      <?php } ?>


          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu cũ:</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="old_pass" value="">
              <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                  <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu mới:</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="new_pass" value="">
              <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                  <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
            <div class="col-md-12">
              <input class="form-control" type="password" name="confirm_pass" value="">
              <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
                  <?php } ?>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-12">
              <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
            </div>
          </div>
          </div>
          
          </form>
      </div>
  </div>
</div>
<hr>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<?php 
// Sau khi hiển thị thông báo lỗi, bạn có thể xóa các lỗi trong session để tránh việc chúng hiển thị lại.
unset($_SESSION['error']);
?>
