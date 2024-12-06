<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './controllers/AuthController.php';
require_once './controllers/CommentController.php';
require_once 'models/CommentModel.php';
require_once './models/DanhMuc.php';

// Các đường dẫn khác của bạn...
// $act = $_GET['act'] ?? '/';


// switch ($act) {
//     case '/':
//         (new HomeController())->home();
//         break;
//     case 'trang-chu':
//         // (new HomeController())->trangChu();
//         break;
//     case 'danh-sach-sp':
//         (new HomeController())->danhsachSanPham();
//         break;
//     case 'san-pham':
//         (new HomeController())->chitietSanPham();
//         break;
//     case 'chi-tiet-san-pham':
//         (new HomeController())->chitietSanPham();
//         break;
//     case 'danh-sach-san-pham':
//         (new HomeController())->danhsachSanPham();
//         break;
//     case 'thuong-hieu-san-pham':
//         (new HomeController())->thuonghieuSanPham();
//         break;
//     case 'login':
//         (new HomeController())->formLogin();
//         break;
//     case 'check-login':
//         (new HomeController())->postLogin();
//         break;
//     case 'register':
//         (new HomeController())->formRegister();
//         break;
//     case 'post-register':
//         (new HomeController())->postRegister();
//         break;
//     case 'logout':
//         (new HomeController())->logout();
//         break;
//     case 'post-comment':
//         (new CommentController())->postComment();
//         break;
//     default:
//         echo "Action không hợp lệ!";
//         break;
// }

// Route
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
// var_dump($_GET);
// match ($act) {
   
//     // Trang chủ

//     '/'=>(new HomeController()) ->home(), //truongwf hopwj ddawcj bieetj
//     // 'trang-chu' => (new HomeController()) ->trangChu(),
//     // BASE_URL/?act=trang-chu
//     // 'danh-sach-sp' =>(new HomeController())->danhsachSanPham()   
//     // BASE_URL/?act=danh-sach-sp
//     // 'san-pham' =>(new HomeController())->chitietSanPham() ,
//     'chi-tiet-san-pham' =>(new HomeController())->chitietSanPham(),
//     'danh-sach-san-pham' =>(new HomeController())->danhsachSanPham(),
//     'thuong-hieu-san-pham'=>(new HomeController())->thuonghieuSanPham(),

//     // var_dump('macth'),die,
//     'login'=>(new HomeController())->formLogin(),
//     'check-login'=> (new HomeController())->postLogin(),
//     'register'=>(new HomeController())->formRegister(),

//     'dang-ky'=> (new HomeController())->postRegister(),
// 'logout'=>(new HomeController())->logout()




match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    // 'trang-chu' => (new HomeController())->home(),
    'danh-sach-sp' => (new HomeController())->danhsachSanPham(),
    'san-pham' => (new HomeController())->chitietSanPham(),
    'chi-tiet-san-pham' => (new HomeController())->chitietSanPham(),
    'danh-sach-san-pham' => (new HomeController())->danhsachSanPham(),
    'thuong-hieu-san-pham' => (new HomeController())->sanPhamTheoDanhMuc(),

    // Đăng nhập, đăng ký và đăng xuất
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'register' => (new HomeController())->formRegister(),
    'post-register' => (new HomeController())->postRegister(),
    'logout' => (new HomeController())->logout(),

    // Bình luận
    'post-comment' => (new CommentController())->postComment(),
    // tài khoản cá nhân
   'view-profile' =>(new HomeController())->viewProfile(),
   'update-profile'=> (new HomeController())->updateProfile(),
   'change-password'=> (new HomeController())->changePassword(),




};
