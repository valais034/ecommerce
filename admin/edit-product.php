<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$cats = get_cats();
$product_id = $_GET['edit-product-id'];
$get_product = get_product_by_id($product_id);
$product = mysqli_fetch_array($get_product);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش: <?php echo $product['product_name'] ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">ویرایش: <?php echo $product['product_name'] ?></h1>
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
        <form action="edit-product.php?edit-product-id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="product-name" placeholder="نام محصول" value="<?php echo $product['product_name'] ?>"><br>
            <input type="text" name="product-price" placeholder="قیمت محصول" value="<?php echo $product['product_price'] ?>"><br>
            <input type="hidden" name="product-id" value="<?php echo $product['id'] ?>">

            <span style="font-size: 11px;margin-right: 5px">دسته‌بندی محصول: <?php echo $product['product_cat'] ?></span>
            <br>
            <select name="product-cat">
                <option value="<?php echo $product['product_cat'] ?>"><?php echo $product['product_cat'] ?></option>
                <?php while ($cat = mysqli_fetch_array($cats)) { ?>
                    <option value="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></option>
                <?php } ?>
            </select>
            <br>
            <img src="../images/<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_name'] ?>" width="120" style="margin-right: 5px"><br>
            <span style="font-size: 11px;margin-right: 5px">عکس محصول:</span>
            <input type="file" name="new-product-image">
            <input type="hidden" name="product-image" value="<?php echo $product['product_image'] ?>">


            <textarea name="product-desc" placeholder="توضیحات محصول"><?php echo $product['product_desc'] ?></textarea><br>
            
            <input type="submit" name="update-product" value="بروزرسانی محصول">
        </form>
    </div>
</div>
</body>
</html>





