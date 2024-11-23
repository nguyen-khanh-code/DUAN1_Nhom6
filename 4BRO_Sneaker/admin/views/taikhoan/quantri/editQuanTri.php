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
          <h1>Quản lý tài khoản quản trị viên</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Sửa thông tin tài khoản quản trị: 
          <?= isset($quanTri['ho_ten']) ? htmlspecialchars($quanTri['ho_ten'], ENT_QUOTES, 'UTF-8') : 'N/A'; ?>
        </h3>
      </div>
      <!-- Form Start -->
      <form method="POST" action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>">
        <input type="hidden" name="quan_tri_id" value="<?= isset($quanTri['id']) ? htmlspecialchars($quanTri['id'], ENT_QUOTES, 'UTF-8') : ''; ?>">

        <div class="card-body">
          <!-- Họ tên -->
          <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" 
                   value="<?= isset($quanTri['ho_ten']) ? htmlspecialchars($quanTri['ho_ten'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập họ tên">
            <?php if (isset($_SESSION['error']['ho_ten'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
            <?php } ?>
          </div>

          <!-- Email -->
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" 
                   value="<?= isset($quanTri['email']) ? htmlspecialchars($quanTri['email'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập email">
            <?php if (isset($_SESSION['error']['email'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
            <?php } ?>
          </div>

          <!-- Số điện thoại -->
          <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" 
                   value="<?= isset($quanTri['so_dien_thoai']) ? htmlspecialchars($quanTri['so_dien_thoai'], ENT_QUOTES, 'UTF-8') : ''; ?>" 
                   placeholder="Nhập số điện thoại">
            <?php if (isset($_SESSION['error']['so_dien_thoai'])){ ?> 
                <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
            <?php } ?>
          </div>

          <!-- Trạng thái tài khoản -->
          <div class="form-group">
            <label for="inputStatus">Trạng thái tài khoản</label>
            <select name="trang_thai" id="inputStatus" class="form-control custom-select">
              <option <?= isset($quanTri['trang_thai']) && $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
              <option <?= isset($quanTri['trang_thai']) && $quanTri['trang_thai'] != 1 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
          <a href="?act=list-tai-khoan-quan-tri" class="btn btn-secondary">Quay lại</a>
        </div>
      </form>
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
