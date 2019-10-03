<?php
  session_start();

  if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home</title>
     <link rel="stylesheet" type="text/css" href="index.css">
   </head>
   <body>
     <div class="header">
      <h2></h2>
     </div>

     <div class="content">

       <?php if(isset($_SESSION['success'])) : ?>
         <div class="">
            <h3>
              <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
              ?>
            </h3>
         </div>
       <?php endif ?>

<!-- LOGGEd in user information-->
       <?php if(isset($_SESSION['username'])) : ?>
         <div class="content">

           <div class="userHeader">
             <img src="biterlyLogo.png" alt="">
             <!--<p>Welcome <strong><?php //echo $_SESSION['username']; ?></strong></p> -->
             <p><a href="index.php?logout='1'" style="color:red:"> Logout </a> </p>
           </div>

          <!--enctype specifies how the form data should be encoded -->
           <form class="" action="upload.php" method="post" enctype="multipart/form-data" >
             <!-- accapting a file -->
             <input type="file" name="file" value="">
             <button type="submit" name="submit">UPLOAD</button>
           </form>

           <div class="userCol">
             <ul class="userMenu">
               <li>Host</li><hr>
               <li>Discover</li><hr>
               <li>Open</li><hr>
               <li>Past</li><hr>
             </ul>
           </div>
         </div>
       <?php endif ?>
     </div>

   </body>
 </html>
