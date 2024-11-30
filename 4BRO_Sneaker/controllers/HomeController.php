<?php

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public $authController;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();

        $this->modelTaiKhoan = new TaiKhoan();
        $this->authController = new AuthController();
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

    // public function thuonghieuSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanpham = $this->modelSanPham->getDetailSanPham($id);
    //     $listSanPham = $this->modelSanPham->getAllSanPham();
    //     $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
    //     $listSanPhamvaDanhMuc = $this->modelSanPham->getlistSanPhamDanhMuc($sanpham['danh_muc_id']);

    //     require_once './views/thuonghieuSanPham.php';
    // }
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
            $user = $this->authController->login($email, $password);
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

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = 'Email hoặc mật khẩu không chính xác';
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
    public function viewProfile()
    {
        $userId = $_SESSION['user_id'];
        $taiKhoan = new TaiKhoan();
        $user = $taiKhoan->getUserById($userId);
        require_once './views/thongTinCaNhan.php';
    }
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $anh_dai_dien = $_FILES['anh_dai_dien']['name'];
            if ($anh_dai_dien) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($anh_dai_dien);
                move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $targetFile);
            } else {
                $anh_dai_dien = $_POST['current_avatar'];
            }
            $taiKhoan = new TaiKhoan();
            $taiKhoan->updateUser($userId, $ho_ten, $email, $anh_dai_dien);
            header("Location: " . BASE_URL . '?act=view-profile');
            exit();
        }
    }
    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['user_id'];
            $oldPassword = $_POST['old_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];
            if ($newPassword !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu xác nhận không khớp.";
                header("Location: " . BASE_URL . '?act=view-profile');
                exit();
            } 
            var_dump($oldPassword);die;
            $taiKhoan = new TaiKhoan();
            $user = $taiKhoan->getUserById($userId);
            if ($user && password_verify($oldPassword, $user['mat_khau'])) {
                $taiKhoan->updatePassword($userId, $newPassword);
                $_SESSION['success'] = "Mật khẩu đã được thay đổi thành công.";
       

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
}
