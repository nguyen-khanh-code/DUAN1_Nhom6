<?php
class adminSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id=danh_mucs.id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function insertSanPham($ten_san_pham, $gia_khuyen_mai, $gia_san_pham, $so_luong, $danh_muc_id, $trang_thai, $mo_ta, $ngay_nhap, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO san_phams( ten_san_pham, gia_khuyen_mai, gia_san_pham, so_luong, danh_muc_id, trang_thai, mo_ta, ngay_nhap, hinh_anh)
             VALUES(:ten_san_pham,:gia_khuyen_mai,:gia_san_pham,:so_luong,:danh_muc_id,:trang_thai,:mo_ta,:ngay_nhap,:hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':gia_san_pham' => $gia_san_pham,
                ':so_luong' => $so_luong,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':ngay_nhap' => $ngay_nhap,
                ':hinh_anh' => $hinh_anh



            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }


    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id=danh_mucs.id WHERE san_phams.id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function updateSanPham($san_pham_id, $ten_san_pham, $gia_khuyen_mai, $gia_san_pham, $so_luong, $danh_muc_id, $trang_thai, $mo_ta, $ngay_nhap, $hinh_anh)
    {

        try {
            $sql = 'UPDATE san_phams 
            SET
            ten_san_pham=:ten_san_pham,
            gia_khuyen_mai=:gia_khuyen_mai,
            gia_san_pham=:gia_san_pham,
            so_luong=:so_luong,
            danh_muc_id=:danh_muc_id,
            mo_ta=:mo_ta,
            ngay_nhap=:ngay_nhap,
            hinh_anh=:hinh_anh,
            trang_thai=:trang_thai

            WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $san_pham_id,
                ':ten_san_pham' => $ten_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':gia_san_pham' => $gia_san_pham,
                ':so_luong' => $so_luong,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':ngay_nhap' => $ngay_nhap,
                ':hinh_anh' => $hinh_anh
            ]);
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    
    public function destroySanPham($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    // day la binh luan
    
    public function getBinhLuanFromKhachHang($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham
            FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id=san_phams.id
            WHERE binh_luans.tai_khoan_id = :id
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function getDetailBinhLuan($id)
    {
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function updateTrangThaiBinhLuan($id, $trang_thai)
    {

        try {
            $sql = 'UPDATE binh_luans 
            SET
            trang_thai=:trang_thai

            WHERE id=:id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id)
{
    try {
        $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham, tai_khoans.ho_ten,tai_khoans.anh_dai_dien
        FROM binh_luans
        INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
        INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
        WHERE binh_luans.san_pham_id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "loi" . $e->getMessage();
    }
}

}
