<?php
session_start();
class adminTaiKhoanController {
    public $modelTaiKhoan;

    public function __construct(){
        $this->modelTaiKhoan = new adminTaiKhoan();
    }

    public function danhSachQuanTri(){
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        // Gọi view để hiển thị danh sách quản trị
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    

    public function formAddQuanTri(){
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }

    public function postAddQuanTri(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $errors =[];
    
            if (empty($ho_ten)){
                $errors['ho_ten'] = 'Tên không được để trống';
            }
    
            if (empty($email)){
                $errors['email'] = 'Email không được để trống';
            }
    
            $_SESSION['error'] = $errors;
    
            if(empty($errors)){
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;
    
                if ($this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)) {
                    header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                    exit();
                } else {
                    $_SESSION['error'] = ['general' => 'Lỗi khi thêm tài khoản.'];
                }
            } else {
                $_SESSION["flash"] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function formEditQuanTri(){
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        require_once './views/taikhoan/quantri/editQuanTri.php';
    }
    
    
}
