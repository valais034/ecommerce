<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$products = get_products();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">لیست محصولات</h1>
    <div class="sidebar">
        <ul>
            <li><a href="../index.php">مشاهده فروشگاه</a></li>
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
                <th>نام محصول</th>
                <th>قیمت محصول</th>
                <th>دسته بندی</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <?php
            while ($product = mysqli_fetch_array($products)) {
                ?>
                <tr>
                    <td><?php echo $product['product_name'] ?></td>
                    <td><?php echo $product['product_price'] ?></td>
                    <td><?php echo $product['product_cat'] ?></td>
                    <td><a href="edit-product.php?edit-product-id=<?php echo $product['id'] ?>">ویرایش</a></td>
                    <td><a href="?delete-product-id=<?php echo $product['id'] ?>" onclick="return confirm('آیا میخواهید این محصول را حذف کنید؟')">حذف</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>