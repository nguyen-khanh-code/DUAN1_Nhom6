<?php
class CommentController {
    private $authController;

    public function __construct() {
        $this->authController = new AuthController();
    }

    public function postComment() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$this->authController->isLoggedIn()) {
                $_SESSION['error'] = "Bạn phải đăng nhập để bình luận.";
                header("Location: " . BASE_URL . "?act=login");
                exit();
            }

            $commentText = $_POST['comment'];
            $userId = $_SESSION['user_id'];
            $postId = $_POST['post_id'];
          

            CommentModel::saveComment((int)$userId, $commentText, (int)$postId);

            $_SESSION['success'] = "Bình luận của bạn đã được gửi.";
            header("Location: " . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $postId);
            // exit();
        }
    }
}


