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
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">Nguyễn duy khnh</h3>
                    <div class="col-12">
                        <img style="width:400px;height:600px" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">Tên sản phẩm: <?=$sanpham['ten_san_pham']?></h3>
                    <hr>
                    <h4 class="mt-3">Giá tiền:  <small><?=$sanpham['gia_san_pham']?></small></h4>
                    <h4 class="mt-3">Giá khuyến mãi:  <small><?=$sanpham['gia_khuyen_mai']?></small></h4>
                    <h4 class="mt-3">Số lượng:  <small><?=$sanpham['so_luong']?></small></h4>
                    <h4 class="mt-3">Lượt xem:  <small><?=$sanpham['luot_xem']?></small></h4>
                    <h4 class="mt-3">Ngày nhập:  <small><?=$sanpham['ngay_nhap']?></small></h4>
                    <h4 class="mt-3">Danh mục:  <small><?=$sanpham['ten_danh_muc']?></small></h4>
                    <h4 class="mt-3">Trạng thái:  <small><?=$sanpham['trang_thai'] ==1 ? 'Còn hàng':'Hết hàng'?></small></h4>
                    <h4 class="mt-3">Mô tả:  <small><?=$sanpham['mo_ta']?></small></h4>
                </div>
            </div>
            
            <!-- Bình luận section -->
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs col-12" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận</a>
                    </div>
                </nav>
                <div class="col-12">
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người bình luận</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Trạng Thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <?php if (isset($binhLuan['ho_ten'])): ?>
                                            <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a>
                                        <?php else: ?>
                                            <p>Thông tin không có</p>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                    <td><?= $binhLuan['ngay_dang'] ?></td>
                                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị Ẩn' ?></td>
                                    <td>
                                        <div class="btn-group ">
                                            <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id']?>">
                                                <input type="hidden" name="name_view" value="detail_sanpham">
                                                <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id']?>">
                                                <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')" class="btn btn-warning">
                                                    <?= $binhLuan['trang_thai'] == 1 ? "Ẩn" : "Bỏ ẩn" ?>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->

<script>
  $(function() {
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
</body>
</html>




