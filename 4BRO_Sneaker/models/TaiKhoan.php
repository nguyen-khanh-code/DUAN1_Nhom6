<?php

class  TaiKhoan 
    {
        public $conn;
        public function __construct()
        {
            $this->conn = connectDB();
        }
        public function checkLogin($email, $mat_khau) {
            try {
                $sql = "SELECT * FROM tai_khoans WHERE email = :email";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch();
        
                if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                    if ($user['chuc_vu_id'] == 2) {
                        if ($user['trang_thai'] == 1) {
                            return $user['email'];
                        } else {
                            return "Tài khoản bị cấm";
                        }
                    } else {
                        return "Tài khoản không có quyền đăng nhập";
                    }
                } else {
                    return "Bạn nhập sai thông tin tài khoản hoặc mật khẩu";
                }
            } catch (\Exception $e) {
                echo "Lỗi: " . $e->getMessage();
                return false;
            }
        }
    
    public function register($email, $mat_khau, $chuc_vu_id = 2, $trang_thai = 1) {
        try {
            // Kiểm tra xem email đã tồn tại chưa
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
    
            if ($user) {
                return "Email đã tồn tại";
            } else {
                // Mã hóa mật khẩu
                $hashedPassword = password_hash($mat_khau, PASSWORD_BCRYPT);
    
                // Thêm người dùng mới vào cơ sở dữ liệu
                $sql = "INSERT INTO tai_khoans (email, mat_khau, chuc_vu_id, trang_thai) VALUES (:email, :mat_khau, :chuc_vu_id, :trang_thai)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    'email' => $email,
                    'mat_khau' => $hashedPassword,
                    'chuc_vu_id' => $chuc_vu_id,
                    'trang_thai' => $trang_thai
                ]);
    
                return "Đăng ký thành công";
            }
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

}