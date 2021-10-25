<?php
$products = get_products(3);
?>
<div id="sidebar">
    <?php if (!is_login()) { ?>
        <div class="users">
            <a href="<?php echo PATH; ?>users/login.php" class="login">ورود</a>
            <a href="<?php echo PATH; ?>users/register.php" class="register">ثبت نام</a>
        </div>
    <?php } else { ?>
        <div class="users">
            <a href="<?php echo PATH; ?>users/profile" class="show-profile">نمایش پروفایل</a>
        </div>
    <?php } ?>
    <div class="sidebar-item">
        <ul>
            <?php while ($sidebar_product = mysqli_fetch_array($products)) { ?>
                <li><a href="product.php?product-id=<?php echo $sidebar_product['id'] ?>"><img src="<?php echo PATH ?>images/<?php echo $sidebar_product['product_image'] ?>" alt=""><?php echo $sidebar_product['product_name'] ?></a></li>
                <div class="clear"></div>
            <?php } ?>
        </ul>
    </div>
</div>