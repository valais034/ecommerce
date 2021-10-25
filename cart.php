<?php require_once 'inc/config.php'; ?>
<?php
$products = get_products(6);
$cart_items = get_cart_items();
$cart_total = cart_total();
if (is_login()) {
    $user_data = get_userdata();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>سبد خرید</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <?php require_once 'sections/nav.php' ?>
    </div>
    <div id="logo">
        <h1>سبد خرید</h1>
    </div>
</div>


<div id="main">
    <div id="content">
        <div class="cart">
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
            <?php if (!$cart_items) { ?>
                <div style="text-align: center;font-size: 13px">سبد خرید شما خالی است. لطفا از فروشگاه، اقدام به پر کردن سبد خرید خود کنید.</div>
            <?php } else { ?>
                <h2>سبد خرید</h2>

                <table>
                    <tr>
                        <th>نام محصول</th>
                        <th>قیمت محصول</th>
                        <th>حذف</th>
                    </tr>
                    <?php foreach ($cart_items as $cart_item) { ?>

                        <tr>
                            <td><?php echo $cart_item['product_name'] ?></td>
                            <td><?php echo $cart_item['product_price'] ?> تومان</td>
                            <td style="text-align: center;font-size: 10px"><a href="?delete-from-cart=<?php echo $cart_item['id'] ?>" onclick="return confirm('آیا میخواهید این محصول را از سبد خرید خود حذف کنید؟')">حذف</a></td>
                        </tr>
                    <?php } ?>

                </table>
                <div class="cart-total">جمع سبد خرید: <?php echo $cart_total ?> تومان</div>
                <hr>
                <?php if (!is_login()) { ?>
                    <div style="text-align: center;font-size: 12px">برای ادامه کار و خرید، لطفا <a href="users/login.php">وارد شوید</a> و یا <a href="users/register.php">ثبت نام کنید.</a></div>
                <?php } else { ?>
                    <h2>اطلاعات حساب کاربری</h2>
                    <div class="user-info">
                        <table>
                            <tr>
                                <td>نام شما:</td>
                                <td><?php echo $user_data['display_name'] ?></td>
                            </tr>
                            <tr>
                                <td>آدرس ایمیل:</td>
                                <td><?php echo $user_data['email'] ?></td>
                            </tr>
                            <tr>
                                <td>شماره تماس:</td>
                                <td><?php echo $user_data['user_number'] ?></td>
                            </tr>
                            <tr>
                                <td>آدرس پستی:</td>
                                <td><?php echo $user_data['user_address'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <form action="cart.php" method="post">

                        <input type="hidden" name="user-email" value="<?php echo $user_data['email'] ?>">
                        <input type="hidden" name="user-number" value="<?php echo $user_data['user_number'] ?>">
                        <input type="hidden" name="cart-total" value="<?php echo $cart_total ?>">
                        <input type="hidden" name="product-ids" value="<?php
                        foreach ($cart_items as $cart_item) {
                            echo $cart_item['id'] . ', ';
                        }

                        ?>">

                        <input type="submit" name="submit-order" value="اتصال به درگاه پرداخت">
                    </form>
                <?php } ?>
            <?php } ?>
        </div>
    </div>


    <?php require_once 'sections/sidebar.php' ?>


</div>

<div class="clear"></div>
<?php require_once 'sections/footer.php' ?>


</body>
</html>