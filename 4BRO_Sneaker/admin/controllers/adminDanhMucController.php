<?php

class adminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc=new adminDanhMuc();
    }
    public function danhsachDanhMuc() {
        $danhsachDanhMuc=$this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
//  hien thi form them
    }
    public function AddDanhMuc(){
        // theem
    }
}
