<?php

class adminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new adminDonHang();
    }
    public function danhsachDonHang()
    {
        $danhsachDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }
    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die;
        // lấy thông tin đơn hàng ở bảng đơn hàng
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaisDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        // var_dump($sanPhamDonHang);die;
        require_once './views/donhang/detailDonHang.php';
    }
   
    public function formEditDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        // $listAnhSanPham=$this->modelSanPham->getListAnhSanPham($id);
        // var_dump($sanpham);die;
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        if ($donHang) {

            require_once './views/donhang/editDonHang.php';
            deletesessionError();
            // require_once './views/sanpham/editSanPham.php';
        } else {
            header("location:" . '?act=don-hang');
        }
    }
    public function editDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'] ?? '';


            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan' ?? ''];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan' ?? ''];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan' ?? ''];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan' ?? ''];
            $ghi_chu = $_POST['ghi_chu' ?? ''];
            $trang_thai_id = $_POST['trang_thai_id' ?? ''];



            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'SDT người nhận không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái đơn hàng';
            }

            //  var_dump($errors);die;
            $_SESSION['error'] = $errors;
            // var_dump($errors);die;
            // nếu không có lỗi tiến hành sửa 
            // var_dump($errors);die;
            if (empty($errors)) {
                $this->modelDonHang->updateDonHang(
                    $don_hang_id,
                    $ten_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $email_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ghi_chu,
                    $trang_thai_id

                );



                header("location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
                require_once './views/donhang/editDonHang.php';
            }

            // $this->modelDanhMuc->getAllDanhMuc();
            // require_once './views/sanpham/addSanPham.php';
        }
        // require_once './views/sanpham/addSanPham.php';

    }
    // public function deleteSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanpham = $this->modelSanPham->getDetailSanPham($id);
    //     if ($sanpham) {
    //         deletefile($sanpham['hinh_anh']);
    //         $this->modelSanPham->destroySanPham($id);
    //     }
    //     header("location:".'?act=san-pham');
    //     exit();
    // }
    // public function detailSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanpham = $this->modelSanPham->getDetailSanPham($id);
    //     // $listSanPham=$this->modelSanPham->getListAnhSanPham($id);
    //     // var_dump($sanpham);die;
    //     // $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

    //     if ($sanpham) {

    //         require_once './views/sanpham/detailSanPham.php';
    //         // deletesessionError();
    //         // require_once './views/sanpham/editSanPham.php';
    //     } else {
    //         header("location:" . '?act=san-pham');
    //     }
    // }
}
