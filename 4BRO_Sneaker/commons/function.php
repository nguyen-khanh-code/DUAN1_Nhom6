<?php
// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
//them file
function uploadfile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}
// xóa file
function deletefile($file)
{
    $pathdelete = PATH_ROOT . $file;
    if (file_exists($pathdelete)) {
        unlink($pathdelete);
    }
    // return null;
}

function deletesessionError(){
    if(isset($_SESSION['flash'])){
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}
function formatPrice($price){
    return number_format($price,0, ',', '.');
}

// format date 
function formatDate($date){
    return date("d-m-Y", strtotime($date));
}
function checkLoginAdmin(){
    if(!isset($_SESSION['user_admin'])) {
        require_once './views/auth/formLogin.php';
        // var_dump('abc');die;
        exit();
    }
}
function getStatusClassSau($trang_thai_id) {
    $trang_thai_id = $trang_thai_id + 1;
    switch ($trang_thai_id) {
        case 1:
            return 'danger'; // Đỏ
        case 2:
            return 'success'; // Xanh lá
        case 3:
            return 'warning'; // Vàng
        case 4:
            return 'primary'; // Xanh dương
        case 5:
            return 'info'; // Xanh nhạt
        case 6:
            return 'secondary'; // Xám
        case 7:
            return 'success'; // Xanh lá
        case 8:
            return 'secondary'; // Xám đậm
        case 9:
            return 'danger'; // Đỏ
        default:
            return 'dark'; // Mặc định
    }
}
function getStatusClass($trang_thai_id) {
    switch ($trang_thai_id) {
        case 1:
            return 'danger'; // Đỏ
        case 2:
            return 'success'; // Xanh lá
        case 3:
            return 'warning'; // Vàng
        case 4:
            return 'primary'; // Xanh dương
        case 5:
            return 'info'; // Xanh nhạt
        case 6:
            return 'secondary'; // Xám
        case 7:
            return 'success'; // Xanh lá
        case 8:
            return 'secondary'; // Xám đậm
        case 9:
            return 'danger'; // Đỏ
        default:
            return 'dark'; // Mặc định
    }
}

// debug

