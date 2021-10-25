<?php require_once '../../inc/config.php'; ?>
<?php
if (!is_login()) {
    redirect('../login.php');
}

$user_data = get_userdata();
$user_orders = get_user_orders();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>سفارش‌ها</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <?php require_once '../../sections/nav.php' ?>
    </div>
    <div id="logo">
        <h1>سفارش‌ها</h1>
    </div>
</div>


<div id="main" class="profile">


    <div class="box" style="padding: 10px;box-sizing: border-box">
        <?php foreach ($user_orders as $user_order) {
            $products = get_order_items($user_order['order_id']);
            ?>
            <div class="order-item">
                <?php if ($user_order['is_paid'] == 0) { ?>
                    <div class="order-id-not-paid"><?php echo $user_order['order_id'] ?>
                        <br>
                        <div class="not-paid">پرداخت نشده</div>
                    </div>
                <?php } else { ?>
                    <div class="order-id-paid"><?php echo $user_order['order_id'] ?>
                        <br>
                        <div class="paid">پرداخت شده</div>
                    </div>
                <?php } ?>
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
        <?php } ?>


    </div>

    <div id="sidebar">
        <div class="sidebar-item">
            <ul>
                <li><a href="index.php">پروفایل</a></li>
                <li><a href="orders.php">سفارش ها</a></li>
                <li><a href="edit-profile.php">ویرایش</a></li>
                <li><a href="?logout=1">خروج</a></li>
            </ul>
        </div>
    </div>

</div>

<div class="clear"></div>

<div id="footer">
    <div class="footer-container container">
        <div class="footer-item">
            <div class="footer-item-title">درباره‌ ما</div>
            <div class="footer-item-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                    درصد
                    گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                    رسد</p>
            </div>
        </div>
        <div class="footer-item">
            <div class="footer-item-title">شبکه‌های اجتماعی</div>
            <div class="footer-item-content">

            </div>
        </div>

        <div class="footer-item">
            <div class="footer-item-title">لینک‌های مفید</div>
            <div class="footer-item-content">
                <ul>
                    <li><a href="#">صفحه اصلی</a></li>
                    <li><a href="#">محصولات آموزشی</a></li>
                    <li><a href="#">وبلاگ</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                    <li><a href="#">بخش مدیریت</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="copyright"><p class="container">تمامی حقوق برای مرکز آموزشی زنبیل محفوظ می‌باشد.</p></div>


</body>
</html>