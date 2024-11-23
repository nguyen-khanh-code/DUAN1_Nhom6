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
      <div class="card-header">
        <a href="?act=form-them-san-pham"><button class="btn btn-success">Thêm sản phẩm</button></a>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>

            <tr>
              <th>ID</th>
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              <!-- <th>Giá khuyễn mãi </th> -->
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Lượt xem</th>
              <!-- <th>Ngày Nhập</th> -->
              <!-- <th>Mô tả</th> -->
              <th> ID danh mục</th>
              <th>Trạng Thái</th>
              <th>Thao tác</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($danhsachSanPham as $key => $sanpham): ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $sanpham['ten_san_pham'] ?></td>
                <td><?= $sanpham['gia_san_pham'] ?></td>
                <!-- <td></td> -->
                <td><img class="w-50 h-50" src="<?php echo  BASE_URL . $sanpham['hinh_anh'] ?>" alt=""> </td>
                <td><?= $sanpham['so_luong'] ?></td>
                <td><?= $sanpham['luot_xem'] ?></td>
               
                <td><?= $sanpham['ten_danh_muc'] ?></td>
                <td><?= $sanpham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?> </td>


                <td>
                  <div class="btn-group ">
                    <a class="p-1" href="?act=chi-tiet-san-pham&id_san_pham=<?= $sanpham['id'] ?>">
                      <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                    </a>
                    <a class="p-1" href="?act=form-sua-san-pham&id_san_pham=<?= $sanpham['id'] ?>">
                      <button class="btn btn-warning"><i class="fa-solid fa-gear"></i></button></a>
                    <!-- <button class="btn btn-danger">Xóa</button> -->
                    <a class="p-1" href="?act=xoa-san-pham&id_san_pham=<?= $sanpham['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa không')">
                      <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </a>
                  </div>
                </td>
              </tr>

            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              <!-- <th>Giá khuyễn mãi </th> -->
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Lượt xem</th>
              <!-- <th>Ngày Nhập</th> -->
              <!-- <th>Mô tả</th> -->
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