<?php
class SanPham
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
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
            FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            where binh_luans.san_pham_id = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function postComment($san_pham_id, $noi_dung, $tai_khoan_id, $ngay_dang) {
        try {
            $sql = "INSERT INTO binh_luans (san_pham_id, noi_dung, tai_khoan_id, ngay_dang) VALUES (:san_pham_id, :noi_dung, :tai_khoan_id, :ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':noi_dung' => $noi_dung,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ngay_dang' => $ngay_dang
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getlistSanPhamDanhMuc($danh_muc_id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getSanPhamByDanhMuc($danhMucId)
    {
        try {
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danhMucId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSanPhamById($id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_muc.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_muc ON san_phams.danh_muc_id = danh_muc.id
           
             WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getMaGiamGiaByMa($ma){
        try {
            $sql = "SELECT * FROM ma_giam_gias 
            WHERE ma=:ma";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma'=> $ma
            ]);
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
