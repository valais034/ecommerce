<?php require_once '../inc/config.php';
if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';
?>


<div class="forms-box">
    <?php
    if ($message) {
        ?>
        <div class="success-message"><?php echo $message ?></div>
        <?php
    }
    if ($error) {
        ?>
        <div class="error-message"><?php echo $error ?></div>
        <?php
    }
    ?>
    <form action="forgot.php" method="post">
        <p>برای بازیابی کلمه عبور، ایمیلی که با آن در سایت ثبت نام کرده بودید را وارد نمایید:</p>
        <input type="email" name="email" placeholder="ایمیل شما ...">
        <input type="submit" name="forgot-pass" value="بازیابی کلمه عبور">
    </form>
</div>

<div class="clear"></div>
<?php require_once '../sections/footer.php' ?>
</body>
</html>