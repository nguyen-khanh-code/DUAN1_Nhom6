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
            <h1>Quản lí danh mục</h1>
          </div>
         
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                
                <a  href="?act=form-them-danh-muc"><button class="btn btn-success">Thêm danh mục</button></a>
              </div>
                
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả </th>
                    <th>Thao tác </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($danhsachDanhMuc as $key=>$danhmuc) : ?>
                  <tr>
                    <td><?= $key+1?></td>
                    <td><?= $danhmuc['ten_danh_muc']?></td>
                    <td><?= $danhmuc['mo_ta']?></td>
                    <td>
                    <a href="?act=form-sua-danh-muc&id_danh_muc=<?= $danhmuc['id'] ?>">

                    <button class="btn btn-warning"><i class="fa-solid fa-gear"></i></button>
                      </a>
                      <a class="p-1" href="?act=xoa-danh-muc&id_danh_muc=<?= $danhmuc['id'] ?>" onclick="return confirm('Bạn có đồng ý xóa không')">
                      <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </a>

                    </td>
                  </tr>
        
                 <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả </th>
                    <th>Thao tác </th>
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
  

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
