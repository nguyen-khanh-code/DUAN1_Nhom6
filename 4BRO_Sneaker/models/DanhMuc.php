<?php

class DanhMuc {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getDanhMucById($id) {
        $sql = "SELECT * FROM danh_mucs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

}
