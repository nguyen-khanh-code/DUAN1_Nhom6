<?php

class adminSanPhamController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham=new adminSanPham();
    }
    public function danhsachSanPham() {
        $danhsachSanPham=$this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/SanPham.php';
    }
}