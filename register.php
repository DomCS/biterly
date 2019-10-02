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

    <div id="promo" onpageshow="displayPromo()">

    </div>

    <form class="" action="login.php" method="post">

      <?php include('errors.php') ?>

      <span class="logo"><img src="biterlyLogo.png" alt=""></span>

      <div class="input-group">
        <label for="username">Username :</label>
        <input type="text" name="username" value="" required>
      </div>

      <div class="input-group">
        <label for="email">Email :</label>
        <input type="email" name="email" value="" required>
      </div>

      <div class="input-group">
        <label for="password">Password :</label>
        <input type="password" name="password_1" value="" required>
      </div>

      <div class="input-group">
        <label for="password">Confirm Password : </label>
        <input type="password" name="password_2" value="" required>
      </div>

      <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Sign Up</button>
      </div>

      <p>
        Already a member? <a href="login.php">Sign in</a>
      </p>

    </form>
  </body>
</html>
