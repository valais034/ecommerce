<?php require_once '../inc/config.php'; ?>
<?php
if(is_admin_login()){
    redirect("index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود به مدیریت</title>
    <link rel="stylesheet" href="styles/styles.css">
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
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="نام کاربری ادمین"><br>
            <input type="password" name="password" placeholder="رمز ادمین"><br>
            <input type="submit" value="ورود به بخش مدیریت" name="admin-login">
        </form>
    </div>
</div>
</body>
</html>