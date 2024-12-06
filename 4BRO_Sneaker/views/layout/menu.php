 <!-- Start Header Area -->
 <header class="header-area header-wide">
     <!-- main header start -->

     <!-- header top end -->

     <!-- header middle area start -->
     <div class="header-main-area sticky">
         <div class="container">
             <div class="row align-items-center position-relative">

                 <!-- start logo area -->
                 <div class="col-lg-2">
                     <div class="logo">
                         <a href="">

                             <img src="assets/img/logo/LOGO.png" alt="Brand Logo" style="width:80px;height:65px;">
                         </a>
                     </div>
                 </div>
                 <!-- start logo area -->

                 <!-- main menu area start -->
                 <div class="col-lg-6 position-static">
                     <div class="main-menu-area">
                         <div class="main-menu">
                             <!-- main menu navbar start -->
                             <nav class="desktop-menu">
                                 <ul>
                                     <li><a href="<?= BASE_URL ?>">Trang chủ</i></a> </li>
                                     <li><a href="">Thương hiệu</i></a>
                                         <ul class="dropdown">
                                             <li><a href="<?= BASE_URL .'?act=thuong-hieu-san-pham&danh_muc_id=1'?>">Nike</a></li>
                                             <li><a href="<?= BASE_URL .'?act=thuong-hieu-san-pham&danh_muc_id=2'?>">Adidas</a></li>
                                             <li><a href="<?= BASE_URL .'?act=thuong-hieu-san-pham&danh_muc_id=3'?>">Converse</a></li>
                                             <li><a href="<?= BASE_URL .'?act=thuong-hieu-san-pham&danh_muc_id=4'?>">Gucci</a></li>
                                             <li><a href="<?= BASE_URL .'?act=thuong-hieu-san-pham&danh_muc_id=5'?>">Jordan</a></li>
                                             <!-- <li><a href="blog-details.html"></a></li>
                                                    <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                                    <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                                    <li><a href="blog-details-image.html">blog details image</a></li> -->
                                         </ul>

                                     </li>


                                     <li><a href="<?= '?act=danh-sach-san-pham' ?>">Sản phẩm</a>

                                     </li>
                                     <li><a href="#">Giới thiệu</a></li>
                                     <li><a href="#">liên hệ</a></li>


                                 </ul>
                             </nav>
                             <!-- main menu navbar end -->
                         </div>
                     </div>
                 </div>
                 <!-- main menu area end -->

                 <!-- mini cart area start -->
                 <div class="col-lg-4">
                     <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                         <div class="header-search-container">
                             <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                             <form class="header-search-box d-lg-none d-xl-block">
                                 <input type="text" placeholder="Nhập tên sản phẩm " class="header-search-field">
                                 <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                             </form>
                         </div>
                         <div class="header-configure-area">
                             <ul class="nav justify-content-end">
                                 <li class="user-hover">
                                     <a href="#">
                                         <i class="pe-7s-user"></i>
                                     </a>
                                     
                                     <ul class="dropdown-list">
                                     <li><a href="#"><?php 
                                            
                                            if (isset($_SESSION['user_client'])){ 
                                                $name=preg_replace('/@.*/', '', $_SESSION['user_client']);
                                                echo ucfirst($name)
                                            ?></a></li>
                                              <li><a href=" <?= BASE_URL.'?act=view-profile'?>">Tài khoản của tôi</a></li>
                                             <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                         <?php } else { ?>
                                            <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                             <li><a href="<?= BASE_URL . '?act=register' ?>">Đăng ký</a></li>
                                          <?php } ?>
                                     </ul>
                                 </li>
                                 <li>
                                     <a href="?act=gio-hang" class="minicart-btn">
                                         <i class="pe-7s-shopbag"></i>
                                         <div class="notification">2</div>
                                     </a>
                                 </li>
                             </ul>
                         </div>

                     </div>
                 </div>
                 <!-- mini cart area end -->

             </div>
         </div>
     </div>
     <!-- header middle area end -->
     </div>
     <!-- main header start -->

 </header>
 <!-- end Header Area -->