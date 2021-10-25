<?php
if (isset($_POST['upload_image'])) {
$image_name = $_FILES['product_image']['name'];
$image_tmp = $_FILES['product_image']['tmp_name'];
$upload_image = 'images/' . $image_name;

if(move_uploaded_file($image_tmp, $upload_image)) {
echo 'upload is succesfully';
    } else {
    echo 'error is sudden';
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>Document</title>
    </head>
<body>
    
    <form action = "image.php" method = "post" enctype="multipart/form-data">
        <input type = "file" name = "product_image"><br>
        <input type = "submit" name = "upload_image" value = "آپلود عکس">
        
        </form>
        
        
    
    
    
    </body>


</html>