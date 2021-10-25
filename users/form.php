<?php require_once '../inc/config.php'; ?>
if (is_login()) {
    redirect('profile');
}
<? require_once '../sections/header.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>ورود با فرم جدید</title>
    <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
    
</head>
<body>
    
    <div class="container">
        
        <div class="card" style="margin-top: 5rem">
        <div class="card-body"></div> 
        <div calss="card-title">
            
            <h1 class="text-center text-danger">
                login to panel - get method
                
            </h1>
            
        </div>
        
        <form action="login.php" method="post" enctype="multipart/form-data" id="" >
            
    
  <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">email: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" autocomplete="off" autofocus required id="email" name="email">
    </div>
    </div>
     <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pssword" name="password">
      
    </div>
    <div class="mb-3 row">
    <label for="file" class="col-sm-2 col-form-label">file:</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="file" name="file">
      
    </div>
  </div>
  
  <button type="submit" name="do-login" class="btn btn-dark btn-lg">login</button>
  </form>
    </div>
        
        </div>    
        
        
    
    
    <script src = "../dist/bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src = "../dist/bootstrap/js/bootstrap.min.js"></script>

        
<div class="clear"></div>
<?php require_once '../sections/footer.php' ?>


</body>
</html>