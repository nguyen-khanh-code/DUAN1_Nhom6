<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<div class="login-register-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-reg-form-wrap">
                    <h5 class="text-center">THÔNG TIN CÁ NHÂN</h5>


                    <form action="<?= BASE_URL . '?act=update-profile' ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="current_avatar" value="<?= $user['anh_dai_dien'] ?>">
    <div class="single-input-item">
        <input type="text" placeholder="Họ và Tên" name="ho_ten" value="<?= $user['ho_ten'] ?>" />
        <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
            <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
        <?php } ?>
    </div>
    <div class="single-input-item">
        <input type="email" placeholder="Email" name="email" value="<?= $user['email'] ?>" />
        <?php if (isset($_SESSION['error']['email'])) { ?>
            <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
        <?php } ?>
    </div>
    <div class="single-input-item">
        <?php if ($user['anh_dai_dien']): ?>
            <img src="<?= htmlspecialchars($user['anh_dai_dien'], ENT_QUOTES, 'UTF-8') ?>" alt="Avatar" id="avatar-preview" style="max-width: 150px; display: block; margin-bottom: 10px;">
        <?php else: ?>
            <img src="" alt="Avatar" id="avatar-preview" style="max-width: 150px; display: none; margin-bottom: 10px;">
        <?php endif; ?>
        <input type="file" name="anh_dai_dien" onchange="previewAvatar(event)">
    </div>
    <div class="single-input-item">
        <button type="submit" class="btn btn-sqr">Cập nhật thông tin</button>
    </div>
</form>

<script>
function previewAvatar(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('avatar-preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

                </div>
                <div class="login-reg-form-wrap">
                    <h5 class="text-center">ĐỔI MẬT KHẨU</h5>
                    <form action="<?= BASE_URL . '?act=change-password' ?>" method="post">
                        <div class="single-input-item"> <input type="password" placeholder="Mật khẩu hiện tại" name="old_password" required /> </div>
                        <div class="single-input-item"> <input type="password" placeholder="Mật khẩu mới" name="new_password" required /> </div>
                        <div class="single-input-item"> <input type="password" placeholder="Xác nhận mật khẩu mới" name="confirm_password" required /> </div>
                        <div class="single-input-item"> <button class="btn btn-sqr">Đổi mật khẩu</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php';  ?>
<script>
    function previewAvatar(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('avatar-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>