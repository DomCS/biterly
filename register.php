<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register to buy</title>
    <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
    <div class="header">
  	   <h2>Register</h2>
    </div>

    <form class="" action="login.php" method="post">
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="">
      </div>
      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1" value="">
      </div>
      <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_2" value="">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="reg-user">Sign Up</button>
      </div>
      <p>
        Already a member? <a href="login.php">Sign in</a>
      </p>
    </form>
  </body>
</html>
