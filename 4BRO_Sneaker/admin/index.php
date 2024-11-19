<?php
session_start();

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

// Để bảo đảm tính chất chỉ gọi 1 hàm Controller để xử lý request, sử dụng match
try {
    match ($act) {
        // Route danh mục
        'danh-muc' => (new adminDanhMucController())->danhsachDanhMuc(),
        'form-them-danh-muc' => (new adminDanhMucController())->formAddDanhMuc(),
        'them-danh-muc' => (new adminDanhMucController())->AddDanhMuc(),
        'form-sua-danh-muc' => (new adminDanhMucController())->formEditAddDanhMuc(),
        'sua-danh-muc' => (new adminDanhMucController())->EditDanhMuc(),
        'xoa-danh-muc' => (new adminDanhMucController())->deleteDanhMuc(),

        // Route sản phẩm
        'san-pham' => (new adminSanPhamController())->danhsachSanPham(),
        'form-them-san-pham' => (new adminSanPhamController())->formAddSanPham(),
        'them-san-pham' => (new adminSanPhamController())->AddSanPham(),
        'form-sua-san-pham' => (new adminSanPhamController())->formEditSanPham(),
        'sua-san-pham' => (new adminSanPhamController())->editSanPham(),
        'xoa-san-pham' => (new adminSanPhamController())->deleteSanPham(),
        'chi-tiet-san-pham' => (new adminSanPhamController())->detailSanPham(),

        // Route quản lý tài khoản
        'list-tai-khoan-quan-tri' => (new adminTaiKhoanController())->danhSachQuanTri(),
        'form-them-quan-tri' => (new adminTaiKhoanController())->formAddQuanTri(),
        'them-quan-tri' => (new adminTaiKhoanController())->postAddQuanTri(),
        'form-sua-quan-tri' => (new adminTaiKhoanController())->formEditQuanTri(),
        'sua-quan-tri' => (new adminTaiKhoanController())->postEditQuanTri(),
        'reset-password' => (new adminTaiKhoanController())->resetPassword(),
        'list-tai-khoan-khach-hang' => (new adminTaiKhoanController())->danhSachKhachHang(),
        'form-sua-khach-hang' => (new adminTaiKhoanController())->formEditKhachHang(),
        'sua-khach-hang' => (new adminTaiKhoanController())->postEditKhachHang(),
        'chi-tiet-khach-hang' => (new adminTaiKhoanController())->detailKhachHang(),

        // Route auth
        'login-admin' => (new adminTaiKhoanController())->formLogin(),
        'check-login-admin' => (new adminTaiKhoanController())->login(),

        // Default case
        default => throw new Exception('Route không tồn tại hoặc không được hỗ trợ'),
    };
} catch (Exception $e) {
    echo $e->getMessage();
}
