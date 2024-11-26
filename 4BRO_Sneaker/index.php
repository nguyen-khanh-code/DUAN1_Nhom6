<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
// require_once './models/Student.php';
require_once './models/SanPham.php';
// Route
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
// var_dump($_GET);
match ($act) {
   
    // Trang chủ

    '/'=>(new HomeController()) ->home(), //truongwf hopwj ddawcj bieetj
    // 'trang-chu' => (new HomeController()) ->trangChu(),
    // BASE_URL/?act=trang-chu
    // 'danh-sach-sp' =>(new HomeController())->danhsachSanPham()   
    // BASE_URL/?act=danh-sach-sp
    // 'san-pham' =>(new HomeController())->chitietSanPham() ,
    'chi-tiet-san-pham' =>(new HomeController())->chitietSanPham(),
    'danh-sach-san-pham' =>(new HomeController())->danhsachSanPham(),
    'thuong-hieu-san-pham'=>(new HomeController())->thuonghieuSanPham()

    // var_dump('macth'),die,
    



};