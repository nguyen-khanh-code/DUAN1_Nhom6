<?php

class HomeController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham -> getAllSanPham();

        
        require_once './views/home.php';
    }

    public function chitietSanPham(){
        $id = $_GET['id_san_pham'];
        
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        // $listSanPham=$this->modelSanPham->getListAnhSanPham($id);
        // var_dump($sanpham);die;
        // $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        
$listSanPhamvaDanhMuc=$this->modelSanPham->getlistSanPhamDanhMuc($sanpham['danh_muc_id']);
        if ($sanpham) {
            // var_dump($sanpham);die;

            require_once './views/detailSanPham.php';
          
        } else {
            header("location:" . BASE_URL);
        }
    }

   
}
