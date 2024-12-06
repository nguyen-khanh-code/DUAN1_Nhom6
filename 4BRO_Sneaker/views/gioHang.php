<!-- Header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Giỏ hàng của bạn</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; ?>
                            <?php unset($_SESSION['success']); ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php } ?>

                    <?php if (!empty($chiTietGioHang)) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($chiTietGioHang as $item) { ?>
                                    <tr>
                                        <td><?= $item['san_pham_id'] ?></td>
                                        <td><?= $item['so_luong'] ?></td>
                                        <td><?= $item['gia'] ?></td>
                                        <td><?= $item['so_luong'] * $item['gia'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>Giỏ hàng của bạn trống.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
