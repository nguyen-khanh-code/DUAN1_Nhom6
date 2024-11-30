<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<div class="login-register-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-reg-form-wrap">
                    <h5 class="text-center">THÔNG TIN CÁ NHÂN</h5>
                    <?php if (isset($_SESSION['error'])) { ?>
                        <p class="text-danger login-box-msg text-center"> <?= $_SESSION['error'] ?> </p>
                    <?php } elseif (isset($_SESSION['success'])) { ?> <p class="text-success login-box-msg text-center"> <?= $_SESSION['success'] ?> </p>
                    <?php } else { ?> <p class="login-box-msg text-center">Cập nhật thông tin cá nhân của bạn</p>
                    <?php } ?>
                    <form action="<?= BASE_URL . '?act=update-profile' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="current_avatar" value="<?= htmlspecialchars($user['anh_dai_dien']) ?>">
                        <div class="single-input-item"> <input type="text" placeholder="Họ và Tên" name="ho_ten" value="<?= htmlspecialchars($user['ho_ten']) ?>" required /> </div>
                        <div class="single-input-item"> <input type="email" placeholder="Email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required /> </div>
                        <div class="single-input-item"> <?php if ($user['anh_dai_dien']): ?> <img src="uploads/<?= htmlspecialchars($user['anh_dai_dien']) ?>" alt="Avatar" style="max-width: 150px; display: block; margin-bottom: 10px;"> <?php endif; ?> <input type="file" name="anh_dai_dien"> </div>
                        <div class="single-input-item"> <button class="btn btn-sqr">Cập nhật thông tin</button> </div>
                    </form>
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