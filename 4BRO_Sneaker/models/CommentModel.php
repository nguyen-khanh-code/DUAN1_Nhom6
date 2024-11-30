


<?php
class CommentModel {
    public static function saveComment($userId, $commentText, $postId) {
        $conn = connectDB();
        $sql = "INSERT INTO binh_luans (tai_khoan_id, noi_dung, san_pham_id, ngay_dang) VALUES (:user_id, :comment_text, :post_id, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'user_id' => (int)$userId,
            'comment_text' => $commentText,
            'post_id' => (int)$postId
        ]);
    }
}




