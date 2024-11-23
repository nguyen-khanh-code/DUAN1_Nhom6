<!-- Header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản quản trị viên</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary">
                        <a style="color: white" href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">Thêm quản trị viên</a>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($listQuanTri)) : ?>
                            <tr>
                                <td colspan="6" class="text-center">Không có quản trị viên nào.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($listQuanTri as $key => $quanTri) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= htmlspecialchars($quanTri['ho_ten']) ?></td>
                                    <td><?= htmlspecialchars($quanTri['email']) ?></td>
                                    <td><?= htmlspecialchars($quanTri['so_dien_thoai'] ?? 'Chưa cập nhật') ?></td>
                                    <td><?= $quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . urlencode($quanTri['id']) ?>">
                                                <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                            </a>
                                            <a href="?act=reset-password&id_quan_tri=<?= $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password tài khoản này không?')">
                                                <button class="btn btn-danger"><i class="fas fa-redo"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<!-- Scripts -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
