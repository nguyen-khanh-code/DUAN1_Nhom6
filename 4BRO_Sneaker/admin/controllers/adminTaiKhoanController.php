<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class adminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
        $this->modelDonHang = new adminDonHang();
        $this->modelSanPham = new adminSanPham();
    }


    public function deleteSessionError()
    {
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        // Gọi view để hiển thị danh sách quản trị
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }



    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';

        $this->deleteSessionError();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
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

    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        require_once './views/taikhoan/quantri/editQuanTri.php';

        $this->deleteSessionError();
    }

    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $quan_tri_id = $_POST['quan_tri_id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống ';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống ';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri' . $quan_tri_id);
                exit();
            }
        }
    }

    public function resetPassword()
    {
        // Kiểm tra xem tham số nào tồn tại: id_quan_tri hoặc id_khach_hang
        $tai_khoan_id = $_GET['id_quan_tri'] ?? $_GET['id_khach_hang'] ?? null;
        $loai_tai_khoan = isset($_GET['id_quan_tri']) ? 'quan_tri' : (isset($_GET['id_khach_hang']) ? 'khach_hang' : null);

        // Nếu không tìm thấy bất kỳ tham số nào, báo lỗi
        if (!$tai_khoan_id || !$loai_tai_khoan) {
            var_dump('Không tìm thấy id_quan_tri hoặc id_khach_hang');
            die();
        }

        // Lấy chi tiết tài khoản dựa trên ID
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);

        // Kiểm tra xem tài khoản có tồn tại không
        if (!$tai_khoan || !is_array($tai_khoan)) {
            var_dump('Tài khoản không tồn tại hoặc lỗi truy vấn');
            die();
        }

        // Hash mật khẩu mới
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);

        // Reset mật khẩu
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

        // Kiểm tra trạng thái và điều hướng dựa trên loại tài khoản
        if ($status) {
            if ($loai_tai_khoan === 'quan_tri') {
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            } elseif ($loai_tai_khoan === 'khach_hang') {
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            }
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
            die();
        }
    }



    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }


    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachhang/editKhachHang.php';

        $this->deleteSessionError();
    }


    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $khach_hang_id = $_POST['khach_hang_id'] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống ';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống ';
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh người dùng không được để trống ';
            }

            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính người dùng không được để trống ';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai
                );
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);


        $danhsachDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }



    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        $this->deleteSessionError();
        exit();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin email và password từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user)) { // Đăng nhập thành công
                $_SESSION['user_admin'] = $user['email']; // Lưu email người dùng
                $_SESSION['user_name'] = $user['ho_ten']; // Lưu tên người dùng
                header("Location: " . BASE_URL_ADMIN. '?act=danh-muc');
                exit();
            } else { // Đăng nhập thất bại
                $_SESSION['error'] = $user; // Lưu thông báo lỗi
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }


    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanformEmail($email);
        // var_dump($thongTin);die;
        require_once './views/taikhoan/canhan/editCaNhan.php';
        $this->deleteSessionError();
    }

    public function postEditMatKhauCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];

            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);
            $checkPass = password_verify($old_pass, $user['mat_khau']);

            $errors = [];

            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }

            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng điền trường dữ liệu này';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng điền trường dữ liệu này';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng điền trường dữ liệu này';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }

    public function postEditCaNhanQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            // Lưu lại dữ liệu cũ vào session để hiển thị lại
            $_SESSION['old'] = [
                'ho_ten' => $ho_ten,
                'email' => $email,
                'so_dien_thoai' => $so_dien_thoai,
                'ngay_sinh' => $ngay_sinh,
                'gioi_tinh' => $gioi_tinh,
                'dia_chi' => $dia_chi,
                'trang_thai' => $trang_thai,
            ];

            // Kiểm tra lỗi
            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }

            // Nếu có lỗi, lưu lỗi vào session và điều hướng lại form
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }


            // Không có lỗi, tiến hành cập nhật thông tin
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);
            $this->modelTaiKhoan->updateThongTinCaNhan(
                $user['id'],
                $ho_ten,
                $email,
                $so_dien_thoai,
                $ngay_sinh,
                $gioi_tinh,
                $dia_chi,
                $trang_thai
            );

            // Xóa dữ liệu cũ và lỗi khỏi session
            unset($_SESSION['old'], $_SESSION['error']);

            // Lưu thông báo thành công và điều hướng lại form
            $_SESSION['success'] = "Thông tin cá nhân đã được cập nhật thành công";
            header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
            exit();
        }
    }

}
