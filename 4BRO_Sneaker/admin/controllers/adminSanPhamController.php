<?php

class adminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new adminSanPham();
        $this->modelDanhMuc = new adminDanhMuc();
    }
    public function danhsachSanPham()
    {
        $danhsachSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
        deletesessionError();
    }
    public function AddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham' ?? ''];
            $gia_san_pham = $_POST['gia_san_pham' ?? ''];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai' ?? ''];
            $so_luong = $_POST['so_luong' ?? ''];
            $ngay_nhap = $_POST['ngay_nhap' ?? ''];
            $danh_muc_id = $_POST['danh_muc_id' ?? ''];
            $trang_thai = $_POST['trang_thai' ?? ''];
            $mo_ta = $_POST['mo_ta' ?? ''];
            $hinh_anh = $_FILES['hinh_anh' ?? null];
            // lưu hình ảnh
            $file_thumb = uploadfile($hinh_anh, './uploads/');
            // $img_array=$_FILES['img_array'];
            // echo '<pre>';
            // echo $file_thumb;
            // var_dump($_FILES); die();

            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            // if (empty($gia_khuyen_mai)) {
            //     $errors['gia_khuyen_mai'] = 'Giá khuyến sản phẩm không được để trống';
            // }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm không được để trống';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Hình ảnh sản phẩm không được để trống';
            }

            $_SESSION['error'] = $errors;





            if (empty($errors)) {
                $this->modelSanPham->insertSanPham($ten_san_pham, $gia_khuyen_mai, $gia_san_pham, $so_luong, $danh_muc_id, $trang_thai, $mo_ta, $ngay_nhap, $file_thumb);
                // var_dump($san_pham_id);die;
                // if (!empty($img_array['name'])) {
                //    foreach ($img_array['name'] as $key => $value) {
                //     $file=[
                // 'name'=> $img_array['name'][$key],
                // 'type'=> $img_array['type'][$key],
                // 'tmp_name'=> $img_array['tmp_name'][$key],
                // 'error'=> $img_array['error'][$key],
                // 'size'=> $img_array['size'][$key]

                //     ];
                //     $link_hinh_anh=uploadfile($file,'./uploads/');
                //     $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh);
                //    }
                // }


                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
                require_once './views/sanpham/addSanPham.php';
            }

            // $this->modelDanhMuc->getAllDanhMuc();
            // require_once './views/sanpham/addSanPham.php';
        }
        // require_once './views/sanpham/addSanPham.php';

    }
    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        // $listAnhSanPham=$this->modelSanPham->getListAnhSanPham($id);
        // var_dump($sanpham);die;
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        if ($sanpham) {

            require_once './views/sanpham/editSanPham.php';
            deletesessionError();
            // require_once './views/sanpham/editSanPham.php';
        } else {
            header("location:" . '?act=san-pham');
        }
    }
    public function editSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            $sanphamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanphamOld['hinh_anh'];


            $ten_san_pham = $_POST['ten_san_pham' ?? ''];
            $gia_san_pham = $_POST['gia_san_pham' ?? ''];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai' ?? ''];
            $so_luong = $_POST['so_luong' ?? ''];
            $ngay_nhap = $_POST['ngay_nhap' ?? ''];
            $danh_muc_id = $_POST['danh_muc_id' ?? ''];
            $trang_thai = $_POST['trang_thai' ?? ''];
            $mo_ta = $_POST['mo_ta' ?? ''];
            $hinh_anh = $_FILES['hinh_anh' ?? null];
            // lưu hình ảnh


            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            // if (empty($gia_khuyen_mai)) {
            //     $errors['gia_khuyen_mai'] = 'Giá khuyến sản phẩm không được để trống';
            // }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm không được để trống';
            }

            //  var_dump($errors);die;
            $_SESSION['error'] = $errors;
            // var_dump($errors);die;

            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadfile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deletefile($old_file);
                }
            } else {
                $new_file = $old_file;
            }



            if (empty($errors)) {
                $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_khuyen_mai,
                    $gia_san_pham,
                    $so_luong,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $ngay_nhap,
                    
                    $new_file
                );



                header("location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
                require_once './views/sanpham/editSanPham.php';
            }

            // $this->modelDanhMuc->getAllDanhMuc();
            // require_once './views/sanpham/addSanPham.php';
        }
        // require_once './views/sanpham/addSanPham.php';

    }
    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        if ($sanpham) {
            deletefile($sanpham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        header("location:".'?act=san-pham');
        exit();
    }


    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // $listSanPham=$this->modelSanPham->getListAnhSanPham($id);
        // var_dump($sanpham);die;
        // $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        if ($sanpham) {

            require_once './views/sanpham/detailSanPham.php';
            // deletesessionError();
            // require_once './views/sanpham/editSanPham.php';
        } else {
            header("location:" . '?act=san-pham');
        }
    }

    public function updateTrangThaiBinhLuan(){
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        if($binhLuan){
            $trang_thai_update = '';
            if($binhLuan['trang_thai'] == 1){
                $trang_thai_update = 2;
            }else{
                $trang_thai_update = 1;
            }

           $status =  $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
           if($status){
            if($name_view == 'detail_khach'){
                header("location:" . '?act=chi-tiet-khach-hang&id_khach_hang=' . $id_khach_hang);
            }else{
                header("location:" . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
            }
           }
            
        }

    }
}
