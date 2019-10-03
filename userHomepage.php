<?php
  //session_start();
  //include_once 'dbh.php';
include_once 'server.php';
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
     <?php
     $sql = "SELECT * FROM users";
     $result = mysqli_query($db, $sql);
     if (mysqli_num_rows($result) > 0 ){
       while($row = mysqli_fetch_assoc($result)) {
         $id=$row['id'];
         $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
         $resultImg = mysqli_query($db, $sqlImg);
         while ($rowImg = mysqli_fetch_assoc($resultImg)) {
           echo "<div>";
             if($rowImg['status'] == 0) {
               echo "<img src='uploads/profile".$id.".jpg'>";
             } else {
               echo "<img src='uploads/profileDefault.jpg'>";
             }
             echo $row['username'];
           echo "</div>";
         }
       }
     } else {
       echo "there are no users";
     }

      ?>
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
           <?php
              $query = "SELECT * FROM profileimg";
              $result = mysqli_query($db, $query);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                  $id = $row['id'];
                  $queryImg = "SELECT * FROM profileImg WHERE userid=''";
                  $resultImg = mysqli_query($db, $queryImg);
                  while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                    echo "<div>";
                      if($rowImg['status'] == 0) {
                        echo "<img src='uploads/profile".$id.".jpg'>";
                      } else {
                        echo "<img src='uploads/profileDefault.jpg'>";
                      }
                      echo $row['username'];
                    echo "</div>";
                  }
                }
              } else {
                echo "there are no users here yet";
              }
            ?>
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
