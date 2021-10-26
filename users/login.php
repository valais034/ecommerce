<?php require_once '../inc/config.php';
if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';
?>
<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود به مدیریت</title>
    <link rel = "stylesheet" href = "../styles/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

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
    <form action="login.php" method="post">
        <p>ایمیل</p>
        <input type="email" name="email" autocomplete="off" autofocus required><br>
        <p>کلمه عبور</p>
        <input type="password" name="password"><br>
        <input type="submit" name="do-login" value="ورود به حساب کاربری">
    </form>
    <p class="note">حساب کاربری ندارید؟ <a href="register.php">یکی بسازید :)</a></p>
    <p class="note"><a href="reset.php">کلمه عبورم را فراموش کرده‌ام :(</a></p>
</div>

<div class="clear"></div>
<?php require_once '../sections/footer.php' ?>
</body>
</html>