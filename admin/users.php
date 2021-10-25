<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$users = get_users();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست کاربران</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">لیست کاربران</h1>
    <div class="sidebar">
        <ul>
            <li><a href="products.php">مشاهده فروشگاه</a></li>
            <li><a href="products.php">لیست محصولات</a></li>
            <li><a href="add-product.php">افزودن محصول</a></li>
            <li><a href="users.php">لیست کاربران</a></li>
            <li><a href="cats.php">دسته‌بندی‌ها</a></li>
            <li><a href="comments.php">نظرات</a></li>
            <li><a href="orders.php">سفارشات</a></li>
            <li><a href="?admin-logout=1">خروج</a></li>
        </ul>
    </div>
    <div class="content">
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
        <table>
            <thead>
            <tr>
                <th>نام نمایشی کاربر</th>
                <th>ایمیل کاربر</th>
                <th>حذف</th>
            </tr>
            </thead>
            <?php while ($user = mysqli_fetch_array($users)) { ?>
                <tr>
                    <td><?php echo $user['display_name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><a href="?delete-user-id=<?php echo $user['id'] ?>" onclick="return confirm('آیا میخواهید کاربر را حذف کنید؟')">حذف</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>