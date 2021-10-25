<?php require_once '../inc/config.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بازیابی کلمه عبور</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<div class="reset-pass">

    <?php
    $password = $_POST['pass'];
    $pass_conf = $_POST['pass-conf'];
    $email = $_POST['user-email'];
    $hash = $_POST['user-hash'];
    if ($password != $pass_conf) {
        echo 'کلمه عبور و تکرار آن باهم برابر نیستند.';
        echo "<br>";
        echo "<a href='reset.php?email=" . $email . "&hash=" . $hash . "'>امتحان دوباره ...</a>";
    } else {
        if (reset_password(md5($password), $email, $hash)) {
            echo 'پسورد با موفقیت بروزرسانی شد';
        } else {
            echo 'خطایی پیش آمده است. دوباره امتحان کنید';
        }
    }


    ?>
</div>
</body>
</html>