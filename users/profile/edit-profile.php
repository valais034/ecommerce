<?php require_once '../../inc/config.php'; ?>
<?php
if (!is_login()) {
    redirect('../login.php');
}

$user_data = get_userdata();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش پروفایل <?php echo $user_data['display_name'] ?></title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>

<div id="header">
    <div id="top-nav">
        <?php require_once '../../sections/nav.php' ?>
    </div>
    <div id="logo">
        <h1>ویرایش پروفایل <?php echo $user_data['display_name'] ?></h1>
    </div>
</div>


<div id="main" class="profile">


    <div class="box" style="padding: 10px;box-sizing: border-box">
        <div class="update-profile">
            <form action="edit-profile.php" method="post" enctype="multipart/form-data">
                <input type="text" name="display-name" value="<?php echo $user_data['display_name'] ?>" placeholder="نام نمایشی شما ..."><br>
                <input type="text" name="user-address" value="<?php echo $user_data['user_address'] ?>" placeholder="آدرس پستی شما ..."><br>
                <input type="text" name="user-number" value="<?php echo $user_data['user_number'] ?>" placeholder="شماره تماس شما ..."><br>
                <?php if ($user_data['user_image']) { ?>
                    <img src="../../images/profile/<?php echo $user_data['user_image'] ?>" alt="<?php echo $user_data['display_name'] ?>" width="80"><br>
                <?php } else { ?>
                    <img src="../../images/profile/profile.jpg" alt="<?php echo $user_data['display_name'] ?>" width="80"><br>
                <?php } ?>
                <span>تصویر حساب کاربری شما: </span><br>
                <input type="file" name="new-user-image"><br>
                <input type="hidden" value="<?php echo $user_data['user_image'] ?>" name="user-image">

                <input type="hidden" name="user-email" value="<?php echo $user_data['email'] ?>">
                <input type="submit" name="update-profile" value="بروزرسانی پروفایل">
            </form>
        </div>
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