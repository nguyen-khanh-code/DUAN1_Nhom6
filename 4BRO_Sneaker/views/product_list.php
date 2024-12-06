<h1>Danh sách sản phẩm</h1>
<?php foreach ($products as $product): ?>
    <div class="product">
        <h3><?= $product['ten_san_pham'] ?></h3>
        <p>Giá: <?= $product['gia'] ?> VND</p>
    </div>
<?php endforeach; ?>
