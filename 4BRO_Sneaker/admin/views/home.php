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
            <h1>Báo cáo thống kê</h1>
          </div>
         
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
          

            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    
                  <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá khuyễn mãi </th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngày Nhập</th>
                    <th>Mô tả</th>
                    <th> ID danh mục</th>
                    <th>Trạng Thái</th>
                    <th>Thao tác</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($danhsachSanPham)): ?>
            <?php foreach ($danhsachSanPham as $key => $sanpham): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $sanpham['ten_san_pham'] ?></td>
                    <td><?= $sanpham['gia_san_pham'] ?></td>
                    <td><?= $sanpham['gia_khuyen_mai'] ?></td>
                    <td><img class="form-control" src="<?= $sanpham['hinh_anh'] ?>" alt=""></td>
                    <td><?= $sanpham['so_luong'] ?></td>
                    <td><?= $sanpham['luot_xem'] ?></td>
                    <td><?= $sanpham['ngay_nhap'] ?></td>
                    <td><?= $sanpham['mo_ta'] ?></td>
                    <td><?= $sanpham['danh_muc_id'] ?></td>
                    <td><?= $sanpham['trang_thai'] ?></td>
                    <td>
                        <button class="btn btn-warning">Sửa</button>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
    <tr>
        <td colspan="12">Không có sản phẩm nào.</td>
    </tr>
<?php endif ?>

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá khuyễn mãi </th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Lượt xem</th>
                    <th>Ngày Nhập</th>
                    <th>Mô tả</th>
                    <th> ID danh mục</th>
                    <th>Trạng Thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
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
<?php include './views/layout/footer.php'?>;

   <!-- end footer -->
  


<!-- Code injected by live-server -->

</body>
</html>
