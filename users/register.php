<?php require_once '../inc/config.php';

if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php'
?>

<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ثبت نام</title>
    <link rel = "stylesheet" href = "../styles/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
<div id="main">
    <div id="login-page">
        <h1>ورود به بخش مدیریت</h1>
        <?php
        if ($error) {
            ?>
            <div class="error-message"><?php echo $error ?></div>
            <?php
        }
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
    <form action="register.php" method="post">
        <p>نام و نام خانوادگی (به فارسی)</p>
        <input type="text" name="name" autocomplete="off" required><br>
        <p>ایمیل</p>
        <input type="email" name="email" autocomplete="off" required><br>
        <p>کلمه عبور</p>
        <input type="password" name="password" autocomplete="off" required><br>
        <p>تکرار کلمه عبور</p>
        <input type="password" name="password-conf" autocomplete="off" required><br>
        <input type="submit" name="do-register" value="ساخت حساب کاربری جدید">
    </form>
    <p class="note">قبلا ثبت‌نام کرده‌اید؟ <a href="login.php">وارد شوید.</a></p>
</div>

<div class="clear"></div>
<?php require_once '../sections/footer.php' ?>


</body>
</html>