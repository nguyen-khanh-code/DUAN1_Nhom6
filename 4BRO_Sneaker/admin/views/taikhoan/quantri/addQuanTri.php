<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí tài khoản quản trị viên</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm tài khoản quản trị</h3>
      </div>

      <!-- /.card-header -->
      <!-- form start -->
      <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
        <div class="card-body">
          <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
            <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
              <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
            <?php } ?>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <?php if (isset($_SESSION['error']['email'])) { ?>
              <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
            <?php } ?>
          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include './views/layout/footer.php'; ?>

<!-- end footer -->