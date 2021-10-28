<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>مانگو</title>
    <link rel="stylesheet" href="<?php echo PATH; ?>styles/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="relative/path/to/your/javascript.js"></script>
<script>
/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</head>
<body>
    
    
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav-mobile">
  <a href="/ecommerce" class="active"><img src="https://st.mngbcn.com/images/headerNew/logos/mango.svg"></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="#news">محصولات جدید</a>
    <a href="#contact">زنانه</a>
    <a href="#about">مردانه</a>
    <a href="#about">نوجوان</a>
    <a href="#about">کودک</a>

  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



    <div class="toptext">
            <div class=toptext-text>
                <a>ارسال رایگان برای سفارشات بالای یک میلیون تومان - فقط تا پایان پاییز 1400</a>
            </div>
            <div>
                <div id="header">
<div id="header-right">
    <div id="top-nav">
        <nav class="container">
            <ul>
                <img src="https://st.mngbcn.com/images/headerNew/logos/mango.svg">
                <li><a href="<?php echo PATH; ?>">محصولات جدید</a></li>
                <li><a href="<?php echo PATH; ?>index.php#products">زنانه </a></li>
                <li><a href="<?php echo PATH; ?>about.php">مردانه</a></li>
                <li><a href="<?php echo PATH; ?>contact.php">نوجوان</a></li>
                <li><a href="<?php echo PATH; ?>contact.php">کودک</a></li>
            </ul>
        </nav>
    </div>

</div>
                    <div id="header-left">
                       <div class="header-left-box">
                           <i class="fas fa-user"></i><br>
                           <span id="header-left-box1">ورود / ثبت نام</span>

                       </div>
                       <div class="header-left-box">
                           <i class="fas fa-search"></i><br>
                           <span id="header-left-box2">جستجو</span>
                       </div>
                       <div class="header-left-box">
                           <i class="fas fa-heart"></i><br>
                           <span id="header-left-box3">علاقه مندی ها</span>
                       </div>
                       <div class="header-left-box">
                           <i class="fal fa-shopping-bag"></i><br>
                           <span id="header-left-box4">سبد خرید</span>
                       </div>
                    </div>
</div>