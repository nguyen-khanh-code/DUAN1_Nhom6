<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/adminDanhMucController.php';
require_once './controllers/adminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/adminDanhMuc.php';
require_once './models/adminSanPham.php';




// Route 
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
// var_dump($_GET);
match ($act) {
// '/'    => (new adminController())->index(),
// rout danh muc
'danh-muc' => (new adminDanhMucController())->danhsachDanhMuc(),
'form-them-danh-muc' => (new adminDanhMucController())->formAddDanhMuc(),
'them-danh-muc' => (new adminDanhMucController())->AddDanhMuc(),
'form-sua-danh-muc' => (new adminDanhMucController())->formEditAddDanhMuc(),
'sua-danh-muc' => (new adminDanhMucController())->EditDanhMuc(),
'xoa-danh-muc' => (new adminDanhMucController())->deleteDanhMuc(),

'san-pham' => (new adminSanPhamController())->danhsachSanPham()




};