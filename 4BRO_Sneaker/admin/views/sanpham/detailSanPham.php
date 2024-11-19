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
                <!-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div> -->
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">Tên sản phẩm: <?=$sanpham['ten_san_pham']?></p>

                <hr>
                <!-- <h4>Available Colors</h4> -->
                <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                        Green
                        <br>
                        <i class="fas fa-circle fa-2x text-green"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                        Blue
                        <br>
                        <i class="fas fa-circle fa-2x text-blue"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                        Purple
                        <br>
                        <i class="fas fa-circle fa-2x text-purple"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                        Red
                        <br>
                        <i class="fas fa-circle fa-2x text-red"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                        Orange
                        <br>
                        <i class="fas fa-circle fa-2x text-orange"></i>
                    </label>
                </div> -->

                <h4 class="mt-3">Giá tiền:  <small><?=$sanpham['gia_san_pham']?></small></h4>
                <h4 class="mt-3">Giá khuyến mãi:  <small><?=$sanpham['gia_khuyen_mai']?></small></h4>
                <h4 class="mt-3">Số lượng:  <small><?=$sanpham['so_luong']?></small></h4>
                <h4 class="mt-3">Lượt xem:  <small><?=$sanpham['luot_xem']?></small></h4>
                <h4 class="mt-3">Ngày nhập:  <small><?=$sanpham['ngay_nhap']?></small></h4>
                <h4 class="mt-3">Danh mục:  <small><?=$sanpham['ten_danh_muc']?></small></h4>
                <h4 class="mt-3">Trạng thái:  <small><?=$sanpham['trang_thai'] ==1 ? 'Còn hàng':'Hết hàng'?></small></h4>
                <h4 class="mt-3">Mô tả:  <small><?=$sanpham['mo_ta']?></small></h4>



                <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                        <span class="text-xl">S</span>
                        <br>
                        Small
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                        <span class="text-xl">M</span>
                        <br>
                        Medium
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                        <span class="text-xl">L</span>
                        <br>
                        Large
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                        <span class="text-xl">XL</span>
                        <br>
                        Xtra-Large
                    </label>
                </div>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        $80.00
                    </h2>
                    <h4 class="mt-0">
                        <small>Ex Tax: $80.00 </small>
                    </h4>
                </div>

                <div class="mt-4">
                    <div class="btn btn-primary btn-lg btn-flat">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Add to Cart
                    </div>

                    <div class="btn btn-default btn-lg btn-flat">
                        <i class="fas fa-heart fa-lg mr-2"></i>
                        Add to Wishlist
                    </div>
                </div>

                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>

            </div>
        </div> -->
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs col-12" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận</a>
                    <!-- <a class="nav-item" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Bình luận</a> -->
                    <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> -->
                </div>
            </nav>
            <div class="tab-content" id="">
                <!-- <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> </div> -->
                <div class="tab-pane fade show active" id="produc-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="container-fluid">

                    

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên người bình luận</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nguyễn Duy Khánh</td>
                                <td>Giày đẹp giá tốt</td>
                                <td>24/03/2005</td>
                                <td>
                                    <div class="btn-group">
                                        <a href=""><button class="btn btn-warning">Ẩn</button></a>
                                        <a href=""><button class="btn btn-danger">Xóa</button></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> </div> -->
            </div>
        </div>
    </div>

</div>


</section>



    
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



