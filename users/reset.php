<?php require_once '../inc/config.php';
if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';

?>


<div class="forms-box">
    <?php if (isset($_GET['email']) && isset($_GET['hash'])) { ?>
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
        <form action="do-reset.php" method="post">
            <p>رمز جدید خود و تکرار آن را وارد نمایید:</p>
            <input type="password" name="pass" placeholder="رمز جدید ...">
            <input type="password" name="pass-conf" placeholder="تکرار رمز جدید ..." style="margin-top: 10px">
            <input type="hidden" name="user-email" value="<?php echo $_GET['email'] ?>">
            <input type="hidden" name="user-hash" value="<?php echo $_GET['hash'] ?>">

            <input type="submit" name="reset-pass" value="بروزرسانی کلمه عبور">
        </form>
    <?php } else {
        echo 'آدرس درخواستی نامعتبر می‌باشد.';
    } ?>
</div>

<div class="clear"></div>
<?php require_once '../sections/footer.php' ?>
</body>
</html>