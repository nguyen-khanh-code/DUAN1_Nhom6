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
// '/'    => (new adminController())->index(),
// rout danh muc
'danh-muc' => (new adminDanhMucController())->danhsachDanhMuc(),
'form-them-danh-muc' => (new adminDanhMucController())->formAddDanhMuc(),
'them-danh-muc' => (new adminDanhMucController())->AddDanhMuc(),
'form-sua-danh-muc' => (new adminDanhMucController())->formEditAddDanhMuc(),
'sua-danh-muc' => (new adminDanhMucController())->EditDanhMuc(),
'xoa-danh-muc' => (new adminDanhMucController())->deleteDanhMuc(),


// Router bao cao thong ke - trang chu
'/' => (new adminBaoCaoThongKeController()) ->home(),

'danh-muc-san-pham' => (new adminDanhMucController())->danhsachDanhMuc(),
'san-pham' => (new adminSanPhamController())->danhsachSanPham(),



// router quan ly tai khoan
// Quan ly tai khoan quan tri
'list-tai-khoan-quan-tri' => (new adminTaiKhoanController()) -> danhSachQuanTri(),
'form-them-quan-tri' => (new adminTaiKhoanController())->formAddQuanTri(),
'them-quan-tri' => (new adminTaiKhoanController())->postAddQuanTri(),
'form-sua-quan-tri' => (new adminTaiKhoanController())->formEditQuanTri(),
'sua-quan-tri' => (new adminTaiKhoanController())->postEditQuanTri(),

// route reset password tai khoan
'reset-password' => (new adminTaiKhoanController())->resetPassword(),

// Quan ky tai khoan khach hang
'list-tai-khoan-khach-hang' => (new adminTaiKhoanController()) -> danhSachKhachHang(),
'form-sua-khach-hang' => (new adminTaiKhoanController())->formEditKhachHang(),
'sua-khach-hang' => (new adminTaiKhoanController())->postEditKhachHang(),
'chi-tiet-khach-hang' => (new adminTaiKhoanController())->detailKhachHang(),

};