<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<main>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($danhMuc['ten_danh_muc']) ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding">
    <div class="container">
        <div class="row">
            <!-- shop main wrapper start -->
            <div class="col-lg-12">
                <div class="shop-product-wrapper">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                <div class="top-bar-left">
                                    <div class="product-view-mode">
                                        <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                        <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <p>Showing 1–16 of <?= count($sanPhams) ?> results</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item list wrapper start -->
                    <div class="shop-product-wrap grid-view row mbn-30">
                        <!-- product single item start -->
                         <?php foreach ($sanPhams as $key => $sanPham) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <!-- product grid start -->
                              
                            <div class="product-item">
                               
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <img class="" src="<?= htmlspecialchars($sanPham['hinh_anh']) ?>" alt="product">

                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>10%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">Platinum</a></p>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular"><?= htmlspecialchars($sanPham['gia_khuyen_mai']) ?> VND</span>
                                        <span class="price-old"><del><?= htmlspecialchars($sanPham['gia_san_pham']) ?> VND</del></span>
                                    </div>
                                </div>
                            </div>
                             
                            <!-- product grid end -->
                        
                        <!-- product list item end -->
                      </div>
                        <?php }; ?>    <!-- product grid end -->

                    </div>
                    <!-- product item list wrapper end -->

                    <!-- start pagination area -->
                    <div class="paginatoin-area text-center">
    <ul class="pagination-box">
        <li><a class="previous" href="#"><i class="pe-7s-angle-left" id="prev-page"></i></a></li>
        <span id="page-numbers"></span>
        <li><a class="next" href="#"><i class="pe-7s-angle-right" id="next-page"></i></a></li>
    </ul>
</div>
                    <!-- end pagination area -->
                </div>
            </div>
            <!-- shop main wrapper end -->
        </div>
    </div>
</div>
<!-- page main wrapper end -->
</main>
<?php require_once 'layout/footer.php';  ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productsPerPage = 16;
    const products = document.querySelectorAll('.product-item');
    const totalProducts = products.length;
    let currentPage = 1;
    const totalPages = Math.ceil(totalProducts / productsPerPage);

    function showPage(page) {
        const start = (page - 1) * productsPerPage;
        const end = page * productsPerPage;
        products.forEach((product, index) => {
            if (index >= start && index < end) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
        updatePageNumbers();
    }

    function updatePageNumbers() {
        const pageNumbers = document.getElementById('page-numbers');
        pageNumbers.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.textContent = i;
            a.href = "#";
            a.className = i === currentPage ? 'active' : '';
            a.addEventListener('click', function(e) {
                e.preventDefault();
                currentPage = i;
                showPage(currentPage);
            });
            li.appendChild(a);
            pageNumbers.appendChild(li);
        }
    }

    document.getElementById('next-page').addEventListener('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    document.getElementById('prev-page').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    showPage(currentPage); // Hiển thị trang đầu tiên mặc định
});
</script>
