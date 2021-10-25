
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>login</title>

    <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/bootstrap/css/signin.css">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="login.php" method="post" id="login">
    <img class="mb-4" src="../images/logo32.jpg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">ورود به حساب کاربری</h1>
    
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password"class="form-control" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="do-login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>

  </body>
</html>
