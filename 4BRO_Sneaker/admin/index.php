<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/adminDanhMucController.php';
require_once './controllers/adminSanPhamController.php';
require_once './controllers/adminBaoCaoThongKeController.php';
require_once './controllers/adminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/adminDanhMuc.php';
require_once './models/adminSanPham.php';



require_once './models/adminTaiKhoan.php';




// Route
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
// var_dump($_GET);
match ($act) {


// Router bao cao thong ke - trang chu
'/' => (new adminBaoCaoThongKeController()) ->home(),

'danh-muc' => (new adminDanhMucController())->danhsachDanhMuc(),
'san-pham' => (new adminSanPhamController())->danhsachSanPham()



// router quan ly tai khoan
// Quan ly tai khoan quan tri
'list-tai-khoan-quan-tri' => (new adminTaiKhoanController()) -> danhSachQuanTri()


};