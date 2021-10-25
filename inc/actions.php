<?php
$message = '';
$error = '';

if (isset($_POST['do-register'])) {
    $username = $_POST["name"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_conf = $_POST['password-conf'];
   // $hash = 'xblhash' . time();
    if ($password != $password_conf) {
        $error = 'کلمه عبور و تکرار آن با هم برابر نیستند.';
    } else {
        if (register_user($username, $email, md5($password), $hash)) {
            $message = 'ثبت نام شما با موفقیت انجام شد. هم اکنون میتوانید وارد حساب کاربری خود شوید.';
        } else {
            $error = 'مشکلی پیش امده است';
        }
    }
}


if (isset($_POST['do-login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if (login($email, $password)) {
        $_SESSION['user-email'] = $email;
        setcookie('logged-in', 'true', time() + 86400, '/');
    } else {
        $error = 'ایمیل یا کلمه عبور اشتباه است.';
    }
}

if (isset($_GET['logout'])) {
    logout();
    redirect('../../');
}

if (isset($_POST['admin-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (admin_login($username, $password)) {
        $_SESSION['admin-login'] = $username;
        redirect('index.php');
    } else {
        $error = 'نام کاربری و یا کلمه عبور ادمین اشتباه است.';
    }
}

if (isset($_GET['admin-logout'])) {
    admin_logout();
    redirect("../../index.php");
}

if (isset($_POST['add-product'])) {
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_cat = $_POST['product-cat'];
    $image_name = $_FILES['product-image']['name'];
    $image_tmp = $_FILES['product-image']['tmp_name'];
    $product_desc = $_POST['product-desc'];
    if (add_product($product_name, $product_price, $product_cat, $product_desc, $image_name, $image_tmp)) {
        $message = 'محصول با موفقیت اضافه شد.';
    } else {
        $error = 'هنگام افزودن محصول مشکلی پیش آمد.';
    }
}

if (isset($_GET['delete-product-id'])) {
    $product_id = $_GET['delete-product-id'];
    if (delete_product($product_id)) {
        $message = 'محصول با موفقیت حذف شد.';
    } else {
        $error = 'خطایی در حین حذف محصول پیش آمده است.';
    }
}


if (isset($_POST['add-cat'])) {
    $cat_name = $_POST['cat-name'];
    if (add_cat($cat_name)) {
        $message = 'دسته بندی با موفقیت افزوده شد.';
    } else {
        $error = 'در هنگام افزودن دسته بندی خطایی پیش آمده است.';
    }
}

if (isset($_GET['delete-cat-id'])) {
    $cat_id = $_GET['delete-cat-id'];
    if (delete_cat($cat_id)) {
        $message = 'دسته بندی با موفقیت حذف شد.';
    } else {
        $error = 'در حین حذف دسته بندی اشکالی پیش آمده است.';
    }
}

if (isset($_GET['delete-user-id'])) {
    $user_id = $_GET['delete-user-id'];
    if (delete_user($user_id)) {
        $message = 'کاربر با موفقیت حذف شد.';
    } else {
        $error = 'در حین حذف کاربر مشکلی پیش آمده است.';
    }
}


if (isset($_POST['add-comment'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $comment_text = $_POST['comment_text'];
    $id = $_POST['product-id'];
    if (add_comment($username, $email, $comment_text, $id)) {
        $message = 'نظر شما با موفقیت ثبت شد.';
    } else {
        $error = 'هنگام ثبت نظر مشکلی پیش آمده است.';
    }
}

if (isset($_GET['approve-id'])) {
    $comment_id = $_GET['approve-id'];
    if (approve_commnet($comment_id)) {
        $message = 'نظر کاربر تایید شد.';
    } else {
        $error = 'خطایی پیش آمده است.';
    }
}

if (isset($_GET['delete-id'])) {
    $comment_id = $_GET['delete-id'];
    if (delete_comment($comment_id)) {
        $message = 'نظر با موفقیت حذف شد.';
    } else {
        $error = 'خطایی پیش آمده است.';
    }
}

if (isset($_POST['add-answer'])) {
    $answer = $_POST['comment-answer'];
    $comment_id = $_POST['comment-id'];
    if (add_answer($answer, $comment_id)) {
        $message = 'پاسخ با موفقیت ثبت شد و نظر تایید شد.';
    } else {
        $error = 'خطایی پیش آمده است.';
    }
}

if (isset($_POST['update-product'])) {
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_cat = $_POST['product-cat'];
    $product_desc = $_POST['product-desc'];
    $product_id = $_POST['product-id'];


    if (!empty($_FILES['new-product-image']['name'])) {

        $image_name = $_FILES['new-product-image']['name'];
        $image_tmp = $_FILES['new-product-image']['tmp_name'];
        $update_product = update_product($product_name, $product_price, $product_cat, $product_desc, $product_id, $image_name, $image_tmp);

    } else {

        $product_image = $_POST['product-image'];
        $update_product = update_product($product_name, $product_price, $product_cat, $product_desc, $product_id, $product_image);


    }

    if ($update_product) {
        $message = 'محصول با موفقیت بروزرسانی شد.';
    } else {
        $error = 'هنگام بروزرسانی محصول مشکلی پیش آمده است.';
    }
}

if (isset($_POST['update-profile'])) {
    $display_name = $_POST['display-name'];
    $user_address = $_POST['user-address'];
    $user_number = $_POST['user-number'];
    $user_email = $_POST['user-email'];

    if (!empty($_FILES['new-user-image']['name'])) {
        $image_name = $_FILES['new-user-image']['name'];
        $image_tmp = $_FILES['new-user-image']['tmp_name'];
        $update_profile = update_profile($display_name, $user_address, $user_number, $user_email, $image_name, $image_tmp);
    } else {
        $image_name2 = $_POST['user-image'];
        $update_profile = update_profile($display_name, $user_address, $user_number, $user_email, $image_name2);

    }

    if ($update_profile) {
        $message = 'پروفایل با موفقیت بروزرسانی شد.';
    } else {
        $error = 'هنگام بروزرسانی پروفایل مشکلی پیش آمده است.';
    }
}


if (isset($_GET['add-to-cart'])) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $product_id = $_GET['add-to-cart'];
    if (add_to_cart($ip_address, $product_id)) {
        redirect('cart.php');
    }
}

if (isset($_GET['delete-from-cart'])) {
    $product_id = $_GET['delete-from-cart'];
    if (delete_from_cart($product_id)) {
        $message = 'محصول با موفقیت از سبد خرید شما حذف شد.';
    } else {
        $error = 'مشکلی پیش آمده است.';
    }
}

if (isset($_POST['submit-order'])) {
    $email = $_POST['user-email'];
    $product_ids = $_POST['product-ids'];
    $amount = $_POST['cart-total'];
    $mobile = $_POST['user-number'];
    pay($amount, $email, $mobile, $product_ids);
}

if (isset($_POST['forgot-pass'])) {
    $email = $_POST['email'];
    if (check_user($email)) {
        if(send_email($email)){
            $message = 'لینک بازیابی کلمه عبور برای شما ارسال شد';
        }else{
            $error = 'خطایی پیش آمده است.';
        }
    } else {
        $error = 'کاربر در سیستم یافت نشد.';
    }
}

