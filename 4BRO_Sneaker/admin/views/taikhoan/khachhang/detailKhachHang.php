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
      <?php
          $anhDaiDien = !empty($khachHang['anh_dai_dien']) 
              ? BASE_URL . $khachHang['anh_dai_dien'] 
              : 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010';
          ?>
          <div class="col-6">
              <img src="<?php echo $anhDaiDien; ?>" style="width: 70%" alt="Ảnh đại diện">
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
          <hr>
          <h2>Lịch sử mua hàng</h2>
          <table id="example1" class="table table-bordered table-striped">
          <thead>

            <tr>
              <th>ID</th>
              <th>Mã đơn hàng</th>
              <th>Tên người nhận</th>
              <!-- <th>Giá khuyễn mãi </th> -->
              <th>Số điện thoại</th>
              <th>Ngày đặt</th>
              <th>Tổng tiền</th>
              <!-- <th>Ngày Nhập</th> -->
              <th>Trạng Thái</th>
              <th>Thao tác</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($danhsachDonHang as $key => $donHang): ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $donHang['ma_don_hang'] ?></td>
                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                <td><?= $donHang['ngay_dat'] ?></td>
                <td><?= $donHang['tong_tien'] ?></td>
                <td><?= $donHang['ten_trang_thai'] ?></td>
                <td>
                  <div class="btn-group ">
                    <a class="p-1" href="?act=chi-tiet-don-hang&id_don_hang=<?= $donHang['id'] ?>">
                      <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                    </a>
                    <a class="p-1" href="?act=form-sua-don-hang&id_don_hang=<?= $donHang['id'] ?>">
                      <button class="btn btn-warning"><i class="fa-solid fa-gear"></i></button></a>
                    <!-- <button class="btn btn-danger">Xóa</button> -->
                   
                  </div>
                </td>
              </tr>

            <?php endforeach ?>
          </tbody>
        </table>
        </div>

      
        </div>
        <div class="col-12">
          <hr>
          <h2>Lịch sử bình luận</h2>
          <table id="example2" class="table table-bordered table-striped">
          <thead>

            <tr>
              <th>ID</th>
              <th>Sản phẩm</th>
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
                <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                <td><?= $binhLuan['noi_dung'] ?></td>
                <td><?= $binhLuan['ngay_dang'] ?></td>
                <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị Ẩn' ?></td>
                <td>
                  <div class="btn-group ">
                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id']?>">
                          <input type="hidden" name="name_view" value="detail_khach">
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
  </section>
</div>
<!-- /.content-wrapper -->
 

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<?php 
// Sau khi hiển thị thông báo lỗi, bạn có thể xóa các lỗi trong session để tránh việc chúng hiển thị lại.
unset($_SESSION['error']);
?>
<script>
  $(function () {
    if ($("#example1").length) {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }

    if ($("#example2").length) {
      $("#example2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });
    }
  });
</script>