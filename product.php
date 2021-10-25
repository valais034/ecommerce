<?php require_once 'inc/config.php'; ?>
<?php
if ($_GET['product-id']) {
    $product_id = $_GET['product-id'];
    $product_info = mysqli_fetch_array(get_product_by_id($product_id));
}


$pcomments = get_comments_by_product_id($product_id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product_info['product_name'] ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <?php require_once 'sections/nav.php' ?>
    </div>
    <div id="logo">
        <h1><?php echo $product_info['product_name'] ?></h1>
    </div>
</div>


<div id="main">
    <div class="product-page">
        <div class="box">
            <div class="single-product">
                <div class="product-info">
                    <div class="product-image"><img src="images/<?php echo $product_info['product_image'] ?>" alt=""></div>
                    <div class="product-title"><?php echo $product_info['product_name'] ?></div>
                    <div class="product-category">دسته‌بندی: <?php echo $product_info['product_cat'] ?></div>
                    <div class="product-comments">۱۸ نظر</div>
                    <div class="product-buy">
                        <div class="product-price"><?php echo $product_info['product_price'] ?> تومان</div>
                        <div class="add-to-cart-button"><a href="?add-to-cart=<?php echo $product_info['id'] ?>">افزودن به سبد خرید</a></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="product-desc"><?php echo $product_info['product_desc'] ?></div>
            </div>

        </div>
        <div class="box comments">
            <div class="comments-list">

                <?php while ($pcomment = mysqli_fetch_array($pcomments)) { ?>
                    <div id="comment-item-1" class="comment">
                        <div class="user-image"><img src="images/2.jpg" alt=""></div>
                        <div class="comment-username"><?php echo $pcomment['username'] ?></div>
                        <div class="comment-date">۱۲ فروردین ۱۳۹۶</div>
                        <div class="comment-text"><p><?php echo $pcomment['comment_text'] ?></p></div>
                        <?php if ($pcomment['comment_answer']) { ?>
                            <div class="comment-answer"><?php echo $pcomment['comment_answer'] ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
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
            <form action="product.php?product-id=<?php echo $product_id ?>" method="post">
                <input type="text" name="username" placeholder="نام ...">
                <input type="email" name="email" placeholder="ایمیل ..."><br>
                <textarea name="comment_text" placeholder="متن نظر شما ..."></textarea><br>
                <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                <input type="submit" name="add-comment" value="ثبت نظر">
            </form>
        </div>
    </div>

    <?php require_once 'sections/sidebar.php' ?>

</div>

<div class="clear"></div>
<?php require_once 'sections/footer.php' ?>


</body>
</html>