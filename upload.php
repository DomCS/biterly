<?php
if(isset($_POST['submit'])){
//$_FILES superglobal grabs all input file information from a form
  $file = $_FILES['file'];
  //must now extract name, size and what type of file were looking at
  //print_r($file);
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

/*Now we can go ahead and tell the website what type of files we want to
allow */
  $fileExt = explode('.', $fileName);
  //end() grabs very last index of an array
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        if($fileSize < 5000000){
          //gets time format in microseconds for unique id number
          $fileNameNew = "profile".$id.".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
          $result = mysqli_query($db, $sql);
          header("Location: userHomepage.php?uploadsuccess");
        } else{
          echo "your file is too big";
        }
      }else{
          echo "there was an error uploading the file";
      }
  } else{
    echo "you cant upload this file type";
  }

}

 ?>
