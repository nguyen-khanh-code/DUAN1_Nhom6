<?php
class TaiKhoan {
    public $conn;
    public function __construct() {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $password) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['mat_khau'])) {
                return $user['email'];
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function register($ho_ten, $email, $mat_khau, $chuc_vu_id = 2, $trang_thai = 1) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if ($user) {
                return "Email đã tồn tại";
            } else {
                $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
                $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id, trang_thai) VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id, :trang_thai)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['ho_ten' => $ho_ten, 'email' => $email, 'mat_khau' => $hashedPassword, 'chuc_vu_id' => $chuc_vu_id, 'trang_thai' => $trang_thai]);
                return "Đăng ký thành công";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM tai_khoans WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateUser( $ho_ten, $email, $anh_dai_dien) {
        $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, anh_dai_dien = :anh_dai_dien WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ho_ten' => $ho_ten, 'email' => $email, 'anh_dai_dien' => $anh_dai_dien]);
    }

    public function updatePassword($email, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['mat_khau' => $hashedPassword, 'email' => $email]);
    }

    public function getTaiKhoanFormEmail($email) {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email,]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // public function checkEmail($email){
    //     try{
    //         $sql = "SELECT * FROM tai_khoans WHERE email = :email";
    //         $stmt = $this->conn->prepare($sql); 
    //         $stmt->execute([
    //             ':email' =>$email,
        
    //         ]);
            
    //         return $stmt->fetch();
    //     }catch(Exception $e){
    //         echo "Lỗi: ".$e->getMessage();
    //     }
    // }
}
