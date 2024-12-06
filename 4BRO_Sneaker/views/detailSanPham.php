<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= '?act=danh-sach-san-pham' ?>">Sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">

                                    <div class="pro-large-img img-zoom">
                                        <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="product-details" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href=""><?= $sanpham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $sanpham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">

                                        <div class="pro-review">
                                            <?php
                                            $countComment = count($listBinhLuan)

                                            ?>
                                            <span><?= $countComment . 'Bình luận' ?></span>
                                        </div>
                                    </div>

                                    <div class="price-box">
                                        <?php if ($sanpham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanpham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanpham['gia_san_pham']) . 'đ' ?></del></span>

                                        <?php } else { ?>
                                            <span class="price-old"><del><?= formatPrice($sanpham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } ?>
                                    </div>
                                    <!-- <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5> -->

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanpham['so_luong']  ?> Trong kho</span>
                                    </div>

                                    <form action="<?= BASE_URL . '?act=add-GioHang' ?>" method="post">
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanpham['id']; ?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong">
                                                </div>

                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>

                                        <div class="pro-size">
                                            <h6 class="option-title">size :</h6>
                                            <select class="nice-select">
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>41</option>
                                                <option>42</option>

                                            </select>
                                        </div>
                                    </form>
                                    <p class="pro-desc"><?= $sanpham['mo_ta'] ?></p>

                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="form-control" id="tab_three">
                                                <div class="comments-list">
                                                    <?php foreach ($listBinhLuan as $binhluan) : ?>
                                                        <?php if ($binhluan['trang_thai'] == 1) : // Kiểm tra nếu bình luận không bị ẩn 
                                                        ?>
                                                            <div class="total-reviews">
                                                                <div class="rev-avatar">
                                                                    <img src="<?= htmlspecialchars($binhluan['anh_dai_dien']) ?>" alt="" style="width: 55px;height:70px;">
                                                                </div>
                                                                <div class="review-box">
                                                                    <div class="post-author">
                                                                        <p><span><?= htmlspecialchars($binhluan['ho_ten']) ?> </span> <?= htmlspecialchars($binhluan['ngay_dang']) ?></p>
                                                                    </div>
                                                                    <p><?= htmlspecialchars($binhluan['noi_dung']) ?></p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>

                                                <form action="<?= BASE_URL . '?act=post-comment' ?>" method="POST" class="review-form">
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <input type="hidden" name="san_pham_id" value="<?= $sanpham['id'] ?>">
                                                            <?php if (isset($_SESSION['user_client'])) : ?> <input type="hidden" name="tai_khoan" value="<?= $_SESSION['user_client'] ?>"> <?php endif; ?>
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Nội dung bình luận</label>
                                                            <textarea class="form-control" required name="binh_luan"></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Lưu ý:</span>
                                                                Chúng tôi rất trân trọng ý kiến của bạn để cải thiện dịch vụ. Vui lòng cung cấp thông tin cụ thể và chi tiết về trải nghiệm mua hàng của bạn.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Bình luận</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>

        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Liên Quan</h2>
                            <!-- <p class="sub-title"></p> -->
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach ($listSanPhamvaDanhMuc as $key => $sanPham): ?>
                                <!-- product item start -->
                                <?php if ($sanPham['danh_muc_id']): ?>

                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?= $sanPham['id'] ?>">

                                                <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <?php
                                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                $ngayHienTai = new DateTime();
                                                $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                if ($tinhNgay->days <= 7) {
                                                ?>
                                                    <div class="product-label new">
                                                        <span>Sản phẩm mới</span>
                                                    </div>
                                                <?php
                                                } ?>
                                                <div class="product-label discount">
                                                    <span>Giảm giá</span>
                                                </div>
                                            </div>

                                            <div class="cart-hover">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?= $sanPham['id'] ?>">
                                                    <button class="btn btn-cart">Chi tiết</button>
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">

                                            <h6 class="product-name">
                                                <a href="<?= BASE_URL .  '?act=chi-tiet-san-pham&id_san_pham=' ?><?= $sanPham['id'] ?>?>"><?= $sanPham['ten_san_pham'] ?></a>
                                            </h6>
                                            <div class="price-box">
                                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                    <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>

                                                <?php } else { ?>
                                                    <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    <!-- related products area end -->
</main>
<!-- offcanvas mini cart start -->

<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php';  ?>