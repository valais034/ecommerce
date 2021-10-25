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
    <title>محصول جدید</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">محصول جدید</h1>
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
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            <input type="text" name="product-name" placeholder="نام محصول"><br>
            <input type="text" name="product-price" placeholder="قیمت محصول"><br>

            <span style="font-size: 11px;margin-right: 5px">دسته‌بندی محصول:</span>
            <select name="product-cat">
                <option value="0">انتخاب کنید ...</option>
                <?php while ($cat = mysqli_fetch_array($cats)) { ?>
                    <option value="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></option>
                <?php } ?>
            </select>
            <br>

            <span style="font-size: 11px;margin-right: 5px">عکس محصول:</span>
            <input type="file" name="product-image"> <br>


            <textarea name="product-desc" placeholder="توضیحات محصول"></textarea><br>
            <input type="submit" name="add-product" value="افزودن محصول">
        </form>
    </div>
</div>
</body>
</html>





