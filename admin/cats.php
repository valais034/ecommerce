<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}
$cats = get_cats();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>دسته‌بندی‌ها</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">دسته‌بندی‌ها</h1>
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
        <div style="text-align: center">
            <form action="cats.php" method="post">
                <input type="text" name="cat-name" placeholder="نام دسته بندی" style="width: 50%">
                <input type="submit" name="add-cat" value="افزودن دسته جدید">
            </form>
        </div>
        <hr>
        <table>
            <thead>
            <tr>
                <th>نام دسته</th>
                <th>حذف</th>
            </tr>
            </thead>
            <?php while($cat = mysqli_fetch_array($cats)){ ?>
            <tr>
                <td><?php echo $cat['cat_name'] ?></td>
                <td><a href="?delete-cat-id=<?php echo $cat['id'] ?>" onclick="return confirm('آیا میخواهید دسته بندی را حذف کنید؟')">حذف</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>