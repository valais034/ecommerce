<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$orders = get_orders();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>مدیریت سفارشات</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">مدیریت سفارشات</h1>
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
    <div class="content" style="padding: 10px; box-sizing: border-box">


        <?php foreach ($orders as $order) {
            $products = get_order_items($order['order_id']);
            ?>
            <div class="order-item">
                <div class="order-id"><?php echo $order['order_id'] ?>
                    <br>
                    <?php if ($order['is_paid'] == 0) { ?>
                        <div class="not-paid">پرداخت نشده</div>
                        <span style="font-size: 13px"><?php echo $order['user_email'] ?></span>
                    <?php } else { ?>
                        <div class="paid">پرداخت شده</div>
                        <span style="font-size: 13px"><?php echo $order['user_email'] ?></span>
                    <?php } ?>
                </div>
                <table>
                    <tr>
                        <th>نام محصول</th>
                        <th>قیمت محصول</th>
                    </tr>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product['product_name'] ?></td>
                            <td><?php echo $product['product_price'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
</body>
</html>