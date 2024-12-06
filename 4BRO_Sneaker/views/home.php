<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>


   


    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner1.jpg">
                        <div class="container">
                            <div class="row">                     
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->
                  <!-- single slider item start -->
                <!-- <div style="width: 100%, "; class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner2.jpg">
                        <div class="container">
                            <div class="row">                     
                            </div>
                        </div>
                    </div>
                </div> -->
<!-- 
                 single slider item start -->
                 <div style="width: 80%" class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner3.jpg">
                        <div class="container">
                            <div class="row">                     
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>
        <!-- hero slider area end -->
        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao hàng</h6>
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ trợ</h6>
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>hoàn tiền</h6>
                                <p>Hoàn tiền trong 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh toán</h6>
                                <p>Thanh toán bảo mật</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/banner 4.jpg" alt="product banner">
                            </a>
                                <!-- <div class="banner-content text-right">
                                    <h5 class="banner-text1">BEAUTIFUL</h5>
                                    <h2 class="banner-text2">Wedding<span>Rings</span></h2>
                                    <a href="shop.html" class="btn btn-text">Shop Now</a>
                                </div> -->
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/banner 4.jpg" alt="product banner">
                            </a>
                            <!-- <div class="banner-content text-center">
                                <h5 class="banner-text1">EARRINGS</h5>
                                <h2 class="banner-text2">Tangerine Floral <span>Earring</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div> -->
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm</h2>
                            <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                    
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                               

                                                <div class="product-badge">
                                                    <?php 
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                    if ($tinhNgay->days <=7){
                                                     ?>  
                                                        <div class="product-label new">
                                                        <span>Sản phẩm mới</span>
                                                        </div>                                                   
                                                   <?php 
                                                    }?>     
                                                    <div class="product-label discount">
                                                    <span>Giảm giá</span>
                                                    </div>    
                                                </div>
                                               
                                                <div class="cart-hover">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                    <button class="btn btn-cart">Chi tiết</button>
                                                </a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>                       
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) .'đ'?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>

                                                   <?php }else{?>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>
                                                  <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                       <?php endforeach ?>
                                       
                                    </div>

                                    
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm nổi bật</h2>
                            <p class="sub-title">Những sản phẩm xem nhiều nhất<table></table></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">

                        <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                    if ($tinhNgay->days <=7){
                                                     ?>  
                                                        <div class="product-label new">
                                                        <span>Sản phẩm mới</span>
                                                        </div>                                                   
                                                   <?php 
                                                    }?>     
                                                    <div class="product-label discount">
                                                    <span>Giảm giá</span>
                                                    </div>    
                                                </div>
                                               
                                                <div class="cart-hover">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                    <button class="btn btn-cart">Chi tiết</button>
                                                </a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>                       
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) .'đ'?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>

                                                   <?php }else{?>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>
                                                  <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       <?php endforeach ?>
                            
     
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->

        <!-- testimonial area start -->

        <!-- testimonial area end -->

        <!-- group product start -->
        <section class="group-product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="group-product-banner">
                            <figure class="banner-statistics">
                                <a href="#">
                                    <img src="https://cdn.shopify.com/s/files/1/0456/5070/6581/files/giay-sneaker-va-giay-the-thao-co-giong-nhau_600x600.jpg?v=1663556564" alt="product banner">
                                </a>
                                <div class="banner-content banner-content_style3 text-center">
                                    <h6 class="banner-text1">BEAUTIFUL</h6>
                                    <h2 class="banner-text2">Wedding Rings</h2>
                                    <a href="shop.html" class="btn btn-text">Mua ngay</a>
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories-group-wrapper">
                            
                            <div class="section-title-append">
                                <h4>best seller product</h4>
                                <div class="slick-append"></div>
                            </div>
                            

                            <!-- group list carousel start -->
                            <div class="group-list-item-wrapper">
                                <div class="group-list-carousel">
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                <?= $sanPham['ten_san_pham']?></a></h5>
                                                        <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>                       
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) .'đ'?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>

                                                   <?php }else{?>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>
                                                  <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-3.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-7.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Perfect Diamond earring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-9.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden Necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$90.00</span>
                                                    <span class="price-old"><del>$100.</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-11.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden Necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$20.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-13.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-15.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->
                                </div>
                            </div>
                            <!-- group list carousel start -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories-group-wrapper">
                            
                            <div class="section-title-append">
                                <h4>on-sale product</h4>
                                <div class="slick-append"></div>
                            </div>
                            

                            <!-- group list carousel start -->
                            <div class="group-list-item-wrapper">
                                <div class="group-list-carousel">
                                    <!-- group list item start -->
                                    <div class="group-slide-item">
                                    <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                    <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>">
                                                <?= $sanPham['ten_san_pham']?></a></h5>
                                                        <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>                       
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) .'đ'?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>

                                                   <?php }else{?>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) .'đ'?></del></span>
                                                  <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-16.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden Necklaces</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-12.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        exclusive silver top bracellet</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-11.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        top Perfect Diamond necklace</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$50.00</span>
                                                    <span class="price-old"><del>$29.99</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-7.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Diamond Exclusive earrings</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$90.00</span>
                                                    <span class="price-old"><del>$100.</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        corano top exclusive jewellry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$20.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-18.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        Handmade Golden ring</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$55.00</span>
                                                    <span class="price-old"><del>$30.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->

                                    <!-- group list item start -->
                                    <!-- <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                    <img src="assets/img/product/product-14.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                                        exclusive gold Jewelry</a></h5>
                                                <div class="price-box">
                                                    <span class="price-regular">$45.00</span>
                                                    <span class="price-old"><del>$25.00</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- group list item end -->
                                </div>
                            </div>
                            <!-- group list carousel start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- group product end -->

       
        <!-- <section class="latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="section-title text-center">
                            <h2 class="title">latest blogs</h2>
                            <p class="sub-title">There are latest blog posts</p>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                           
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img1.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye Color Changed</a>
                                    </h5>
                                </div>
                            </div>
                          

                           
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img2.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series Experiment</a>
                                    </h5>
                                </div>
                            </div>
                          

                           
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img3.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That Will Date Her</a>
                                    </h5>
                                </div>
                            </div>
                          

                           
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img4.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">People are Willing Lie When Comes Money, According to Research</a>
                                    </h5>
                                </div>
                            </div>
                          

                           
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img5.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">romantic Love Stories Of Hollywoodâ€™s Biggest Celebrities</a>
                                    </h5>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>  -->
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/images.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/6.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo area end -->
    </main>
  <!-- offcanvas mini cart start -->
  <div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
            <div class="offcanvas-overlay"></div>
            <div class="minicart-inner-content">
                <div class="minicart-close">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                        <img src="assets/img/cart/cart-1.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$100.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">
                                        <img src="assets/img/cart/cart-2.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?=$sanPham['id'] ?>?>">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$80.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>$300.00</strong></span>
                            </li>
                            <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>
                            <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong>$370.00</strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas mini cart end -->

   <?php require_once 'layout/footer.php';  ?>
    