<?php require_once '../inc/config.php' ?>
<?php
if (!is_admin_login()) {
    redirect("login.php");
}

$comments = get_comments();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">پنل مدیریت</h1>
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
        <?php if(mysqli_num_rows($comments)==0){
            echo 'نظری برای نمایش وجود ندارد.';
        } ?>
        <?php while ($comment = mysqli_fetch_array($comments)) {
            $product_id = $comment['product_id'];
            $product_name = mysqli_fetch_array(get_product_by_id($product_id));

            ?>
            <div class="comment-item">
                <div class="username"><?php echo $comment['username'] ?></div>
                <div class="comment-text"><?php echo $comment['comment_text'] ?></div>
                <div class="comment-answer">
                    <form action="comments.php" method="post">
                        <textarea name="comment-answer" placeholder="پاسخ این نظر ..."></textarea><br>
                        <input type="hidden" name="comment-id" value="<?php echo $comment['id'] ?>">
                        <input type="submit" name="add-answer" value="ثبت پاسخ">
                    </form>
                </div>
                <div class="comment-buttons">
                    <span><?php echo $product_name['product_name'] ?> (<?php echo $comment['product_id'] ?>)</span>
                    <a href="?approve-id=<?php echo $comment['id'] ?>" class="approve">تایید نظر</a>
                    <a href="?delete-id=<?php echo $comment['id'] ?>" class="delete" onclick="return confirm('آیا میخواهید این نظر را حذف کنید؟')">حذف نظر</a>
                </div>
                <div class="clear"></div>
            </div>
        <?php } ?>

    </div>
</div>
</body>
</html>