<?php

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public $authController;
    public $modelGioHang;
    // public $modelMaGiamGia;
    public $modelDonHang;



    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();

        $this->modelTaiKhoan = new TaiKhoan();
        $this->authController = new AuthController();
        // $this->modelMaGiamGia = new MaGiamGia();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();


        require_once './views/home.php';
    }

    public function chitietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // $CountComment = count($listBinhLuan);
        $listSanPhamvaDanhMuc = $this->modelSanPham->getlistSanPhamDanhMuc($sanpham['danh_muc_id']);
        if ($sanpham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function danhsachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/danhsachSanPham.php';
    }


    public function formLogin()
    {
        require_once 'views/auth/formLogin.php';
        deletesessionError();
    }
    public function formRegister()
    {
        require_once 'views/auth/formRegister.php';
        deletesessionError();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
          
            $errors = [];
            if (empty($email)) {
                $errors[] = 'Vui lòng nhập email.';
            }
            if (empty($password)) {
                $errors[] = 'Vui lòng nhập mật khẩu.';
            }
            if (!empty($errors)) {
                $_SESSION['error'] = implode(' ', $errors);
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }

            if ($user == $email) {
                
                $_SESSION['user_client'] = $user;
                // $_SESSION['user_client'] = $user['id'];
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['ho_ten'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $errors = [];


            if (empty($fullname)) {
                $errors[] = 'Vui lòng nhập tên';
            }
            if (empty($email)) {
                $errors[] = 'Vui lòng nhập email.';
            }

            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu và xác nhận mật khẩu không khớp";
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }
            $result = $this->authController->register($fullname, $email, $password);
            if ($result === "Đăng ký thành công") {
                $_SESSION['success'] = $result;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                $_SESSION['error'] = $result;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=register');
            }
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa toàn bộ session
        session_unset();
        session_destroy();

        // Chuyển hướng về trang đăng nhập
        header("Location: " . BASE_URL . "?act=/");
        exit();
    }
    public function postComment()
    {
        // var_dump($_POST);
        if (isset($_SESSION['user_client'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Kiểm tra sự tồn tại của các khóa trong $_POST

                $san_pham_id = $_POST['san_pham_id'];
                $noi_dung = $_POST['binh_luan'];
                $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
                $tai_khoan_id = $user['id'];
                $ngay_dang = date('Y-m-d H:i:s');

                $s = $this->modelSanPham->postComment($san_pham_id, $noi_dung, $tai_khoan_id, $ngay_dang);
                header('Location:' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        } else {
            header('location:' . BASE_URL . '?act=login');
            exit();
        }
    }
    public function viewProfile()
    {
        $userId = $_SESSION['user_client'];
        $taiKhoan = new TaiKhoan();
        $user = $taiKhoan->getTaiKhoanFormEmail($userId);
        // var_dump($user);die;
        if ($user) {

            require_once './views/thongTinCaNhan.php';
            deletesessionError();
        }
    }
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_SESSION['user_client'];
            $ho_ten = $_POST['ho_ten'];
            // $email = $_POST['email'];
            $anh_dai_dien = $_FILES['anh_dai_dien']['name'];
            if ($anh_dai_dien) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . $anh_dai_dien;
                move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $targetFile);
                $anh_dai_dien=$targetFile;
            } else {
                $anh_dai_dien = $_POST['current_avatar'];
            }
            $taiKhoan = new TaiKhoan();
            $taiKhoan->updateUser( $ho_ten, $email, $anh_dai_dien);


            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Vui lòng nhập họ tên';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            $_SESSION['error'] = $errors;

            header("Location: " . BASE_URL . '?act=view-profile');
            exit();
        }
    }
    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_client'];
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];
            if ($newPassword !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu xác nhận không khớp.";
                header("Location: " . BASE_URL . '?act=view-profile');
                exit();
            }
            // var_dump($oldPassword);die;
            $taiKhoan = new TaiKhoan();
            $user = $taiKhoan->getTaiKhoanFormEmail($userId);
            if ($user && password_verify($oldPassword, $user['mat_khau'])) {
                $taiKhoan->updatePassword($userId, $newPassword);
                $_SESSION['success'] = "Mật khẩu đã được thay đổi thành công.";
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                $_SESSION['error'] = "Mật khẩu hiện tại không đúng.";
            }
            header("Location: " . BASE_URL . '?act=view-profile');
            exit();
        }
    }
    public function sanPhamTheoDanhMuc()
    {
        $danhMucId = $_GET['danh_muc_id'];
        $sanPhams = $this->modelSanPham->getSanPhamByDanhMuc($danhMucId);
        $danhMuc = $this->modelDanhMuc->getDanhMucById($danhMucId);
        require_once './views/thuonghieuSanPham.php';
    }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
                //   var_dump($mail['id']);
                $gioHang = $this->modelGioHang->getGioHangFormId($mail['id']);
                //   var_dump($gioHang);die();
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
                // var_dump($so_luong); die();   

                $checkSanPham = false;
                foreach ($chiTietGioHang as $chiTiet) {
                    if ($chiTiet['san_pham_id'] == $san_pham_id) {
                        // var_dump($chiTiet['san_pham_id']);
                        // var_dump($san_pham_id);
                        // // die();
                        $newSoLuong = $chiTiet['so_luong'] + $so_luong;
                        // var_dump($chiTiet['so_luong']); die();   
                        $this->modelGioHang->updateSoLuongGioHang($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    //   var_dump(!$checkSanPham); die();
                    $this->modelGioHang->addChiTietGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                //   var_dump('them thanh cong');die();
                header('location:' . BASE_URL . '?act=gio-hang');
            } else {
                header('location: ' . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            //   var_dump($mail['id']);
            $gioHang = $this->modelGioHang->getGioHangFormId($mail['id']);
            $maGiam = null;
            if (isset($_POST['ma'])) {
                $maGiam = (new HomeController())->getMaGiamGia();
                // var_dump($maGiam);die();
            }

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                //  var_dump(value: $maGiamGia);die();
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang); die();
            require_once './views/gioHang.php';
        } else {
            header('location:' . BASE_URL . '?act=login');
            exit();
        }
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $giaGiam = $_GET['ma_id'] ?? 0;
            // if(isset($ma)){/-strong/-heart:>:o:-((:-h //   $MaGiam=$this->modelSanPham->getMaGiamGiaByMa($ma);

            // }
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            //   var_dump($mail['id']);
            $gioHang = $this->modelGioHang->getGioHangFormId($user['id']);
            //   var_dump($gioHang);die();
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            //   var_dump($chiTietGioHang); die();
            require_once './views/thanhToan.php';
        } else {
            header('location:' . BASE_URL . '?act=login_client');
            exit();
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_thanh_toan'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d ');
            // var_dump($ngay_dat);
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            $randomBytes = bin2hex(random_bytes(4)); // Tạo chuỗi hex 8 ký tự
            $ma_don_hang = 'DH-' . strtoupper($randomBytes);
            $donHang = $this->modelDonHang->addDonHang(
                $ten_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $email_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $trang_thai_id,
                $tai_khoan_id,
                $ma_don_hang
            );
            // var_dump("thành cong");
            $gioHang = $this->modelGioHang->getGioHangFormId($tai_khoan_id);
            //lưu sản phẩm vào chi tiết đơn hàng
            if ($donHang) {
                //lấy ra toàn bộ sản phẩm
                $chiTietGio = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // thêm từ sản phẩm giỏ hàng vào bảng chi tiết
                foreach ($chiTietGio as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];

                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                }
                //sau khi them xong thì phải tiến hành xóa sản phẩm trong giỏ hàng
                //xóa toàn bộ sản phẩm trong chi tiết giở hàng
                $this->modelGioHang->clearDetailGiongHang($gioHang['id']);
                //xóa thông tin giỏ hàng người dùng/-strong/-heart:>:o:-((:-h $this->modelGioHang->clearGiongHang($tai_khoan_id);

                header('location:' . BASE_URL . '?act=lich-su-mua-hang');
            } else {
                var_dump('lỗi đặt hàng');
            }
        }
    }
    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            //danh sách trạng thái đơn hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // echo "<pre>";
            // print_r($trangThaiDonHang);
            //danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucDonHang();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');


            //danh sách tất cả của đơn hàng tài khoản
            $donHang = $this->modelDonHang->getDonHangFormUser($tai_khoan_id);
            // echo'<pre>';
            // print_r($donHang);
            // die();
            require_once "./views/lichSuMuaHang.php";
        } else {
            header('location:' . BASE_URL . '?act=login');
            exit();
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {

            $don_hang_id = $_GET['id_don_hang'];

            $this->modelDonHang->updateHuyDonHang($don_hang_id, 9);
            header('location: ' . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            header('location:' . BASE_URL . '?act=login');
            exit();
        }
    }
    public function chiTietMuaHang()
    {
        // var_dump($_GET['id_don_hang']);
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            $don_hang_id = $_GET['id_don_hang'];
            //danh sách trạng thái đơn hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // echo "<pre>";
            // print_r($trangThaiDonHang);
            //danh sách trạng thái thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucDonHang();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // thông tin đơn hàng theo id
            $donHang = $this->modelDonHang->getDonHangId($don_hang_id);

            //lấy thông tin bảng chi tiết đơn hàng
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangId($don_hang_id);
            //   echo "<pre>";
            //  print_r($donHang);
            //  print_r($chiTietDonHang);
            // var_dump($donHang['tai_khoan_id']);
            // die();
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "bạn ko có quyền truy cập đơn hàng";
                exit();
            }
            require_once "./views/chiTietMuaHang.php";
        } else {
            header('location:' . BASE_URL . '?act=login');
            exit();
        }
    }

    // Phương thức xử lý cập nhật giỏ hàng
    public function   updateCart()
    {
        // Lấy dữ liệu từ yêu cầu POST (gửi từ AJAX)
        $productId = $_POST['product_id'] ?? null; // ID của sản phẩm
        $quantity = $_POST['quantity'] ?? 0;       // Số lượng sản phẩm mới

        // Kiểm tra xem ID sản phẩm và số lượng có hợp lệ không
        if ($productId > 0 && $quantity >= 0) {
            // Giả sử giỏ hàng của người dùng được lưu trong một session hoặc cơ sở dữ liệu
            // Ví dụ: lấy giỏ hàng từ session
            // Kiểm tra giỏ hàng trong session


            // Nếu có cơ sở dữ liệu, bạn có thể cập nhật ở đây
            // Ví dụ: cập nhật số lượng sản phẩm trong bảng giỏ hàng của người dùng
            $s = $this->modelGioHang->updateCartInDatabase($productId, $quantity);
            // var_dump($s);die();
            echo json_encode(['status' => 'success', 'message' => 'Giỏ hàng đã được cập nhật!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ.']);
        }
    }

    public function deleteSp()
    {
        $productId = $_POST['product_id'] ?? null; // ID của sản phẩm
        $this->modelGioHang->deleteSpInCart($productId);
    }
    public function getMaGiamGia()
    {
        $ma = $_POST['ma'];
        // var_dump($ma);
        $MaGiam = $this->modelSanPham->getMaGiamGiaByMa($ma);
        // var_dump($MaGiam);die();
        // require_once "./views/detailSanPham.php";
        return $MaGiam;
        // require_once "./views/detailSanPham.php";
    }
}
