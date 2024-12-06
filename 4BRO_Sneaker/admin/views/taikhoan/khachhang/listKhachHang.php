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
                    <h1>Quản lý tài khoản khách hàng</h1>
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
                            <th>Ảnh đại diện</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($listKhachHang)) : ?>
                            <tr>
                                <td colspan="7" class="text-center">Không có khách hàng nào.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($listKhachHang as $key => $khachHang) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= htmlspecialchars($khachHang['ho_ten']) ?></td>
                                    <?php
                                    // Định nghĩa BASE_URL nếu chưa được định nghĩa
                                    if (!defined('BASE_URL')) {
                                        define('BASE_URL', 'http://localhost/DUAN1_Nhom6/4BRO_Sneaker/');
                                    }

                                    // Kiểm tra xem ảnh đại diện có tồn tại không, nếu không thì sử dụng ảnh mặc định
                                    $anhDaiDien = !empty($khachHang['anh_dai_dien']) 
                                        ? BASE_URL . $khachHang['anh_dai_dien'] 
                                        : 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010';
                                    ?>
                                    <td>
                                    <img class="form-control" src="<?= htmlspecialchars($anhDaiDien); ?>" alt="Ảnh đại diện" style="width: 100px; height: auto; border: none; outline: none; background: transparent; box-shadow: none;">
                                    </td>

                                    <td><?= htmlspecialchars($khachHang['email']) ?></td>
                                    <td><?= htmlspecialchars($khachHang['so_dien_thoai'] ?? 'Chưa cập nhật') ?></td>
                                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . urlencode($khachHang['id']) ?>">
                                                <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . urlencode($khachHang['id']) ?>">
                                                <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                            </a>
                                            <a href="?act=reset-password&id_khach_hang=<?= $khachHang['id'] ?>" onclick="return confirm('Bạn có muốn reset password tài khoản này không?')">
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
