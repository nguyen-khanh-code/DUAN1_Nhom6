<?php

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
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
        // $listSanPham=$this->modelSanPham->getListAnhSanPham($id);
        // var_dump($sanpham);die;
        // $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamvaDanhMuc = $this->modelSanPham->getlistSanPhamDanhMuc($sanpham['danh_muc_id']);
        if ($sanpham) {
            // var_dump($sanpham);die;

            require_once './views/detailSanPham.php';
        } else {
            header("location:" . BASE_URL);
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
    public function formLogin(){
        require_once './views/auth/formLogin.php';

        $this->deleteSessionError();

    }
    public function formRegister(){
        require_once './views/auth/formDk.php';

        $this->deleteSessionError();

    }


    public function postLogin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lay email va passs

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if($user ==  $email) {
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;

                // var_dump($_SESSION['error']);die; 

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function postRegister() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form đăng ký
            $fullname = $_POST['ho_ten'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
    
            // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp hay không
            if ($password !== $confirmPassword) {
                $_SESSION['register_error'] = "Mật khẩu và xác nhận mật khẩu không khớp";
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }
    
            // Đăng ký tài khoản mới
            $result = $this->modelTaiKhoan->register($fullname, $email, $password);
    
            if ($result === "Đăng ký thành công") {
                $_SESSION['success'] = $result;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                $_SESSION['register_error'] = $result;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }
        }
    }
}
