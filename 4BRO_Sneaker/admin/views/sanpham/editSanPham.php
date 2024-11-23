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
                    <h1>Quản lí sản phẩm</h1>
                </div>

            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="card">
            <!-- <div class="card-header">
                <a href="?act=form-them-san-pham"><button class="btn btn-success">Thêm sản phẩm</button></a>
            </div> -->
            <div class="card-body">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Chỉnh sửa sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin sản phẩm: <?= $sanpham['ten_san_pham'] ?></h3>

                                        <!-- <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanpham['id'] ?>">
                                                <label for="ten_san_pham">Tên sản Phẩm</label>
                                                <input type="text" id="ten_san_pham" class="form-control" name="ten_san_pham" value="<?= $sanpham['ten_san_pham'] ?>">
                                                <?php if (isset($_SESSION['error']['ten_san_pham'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                                <?php } ?>

                                            </div>
                                            <div class="form-group">
                                                <label for="gia_san_pham">Giá sản phẩm</label>
                                                <input type="number" id="gia_san_pham" class="form-control" name="gia_san_pham" value="<?= $sanpham['gia_san_pham'] ?>">
                                                <?php if (isset($_SESSION['error']['gia_san_pham'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                                <input type="number" id="gia_khuyen_mai" class="form-control" name="gia_khuyen_mai" value="<?= $sanpham['gia_khuyen_mai'] ?>">
                                                

                                            </div>
                                            <div class="form-group">
                                                <label for="so_luong">Số lượng</label>
                                                <input type="number" id="so_luong" class="form-control" name="so_luong" value="<?= $sanpham['so_luong'] ?>">
                                                <?php if (isset($_SESSION['error']['so_luong'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="ngay_nhap">Ngày nhập</label>
                                                <input type="date" id="ngay_nhap" class="form-control" name="ngay_nhap" value="<?= $sanpham['ngay_nhap'] ?>">
                                                <?php if (isset($_SESSION['error']['ngay_nhap'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="danh_muc_id">Danh mục</label>
                                                <select name="danh_muc_id" id="danh_muc_id" class="form-control custom-select">
                                                    <?php foreach ($listDanhMuc as $danhmuc) { ?>

                                                        <option <?= $danhmuc['id'] == $sanpham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhmuc['id']; ?>"> <?= $danhmuc['ten_danh_muc'] ?></option>

                                                    <?php } ?>

                                                    <!-- <option>Canceled</option> -->

                                                </select>
                                                <?php if (isset($_SESSION['error']['danh_muc_id'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="hinh_anh">Hình ảnh</label>
                                                <input type="file" id="hinh_anh" class="form-control" name="hinh_anh">
                                                <div>
                                                    <!-- <span>Đường dẫn ảnh:</span>
                                            <input type="text" name="hinh_anh" value=""> -->

                                                    <div class="mt-3">
                                                        <img class="img-fluid w-20" style="height:100px; width:100px;" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="trang_thai">Trạng thái</label>
                                                <select id="trang_thai" class="form-control custom-select" name="trang_thai">
                                                    <option <?= $sanpham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn hàng</option>
                                                    <option <?= $sanpham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng</option>
                                                </select>
                                                <?php if (isset($_SESSION['error']['trang_thai'])) {  ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="mo_ta">Mô tả</label>
                                                <textarea name="mo_ta" id="mo_ta" class="form-control" rows="4"><?= $sanpham['mo_ta'] ?></textarea>
                                                <!-- /.card-body -->
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <a href="?act=san-pham" class="btn btn-secondary">Thoát</a>
                                                    <button  type="submit" class="btn btn-success">Lưu</button>
                                                    <!-- <input type="submit" value="Save Changes" class="btn btn-success "> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                    </section>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php' ?>;

<!-- end footer -->


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>