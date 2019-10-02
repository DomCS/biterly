<?php
session_Start();

//initialize variables
$username = "";
$email = "";

$password = '';
$errors = array();
//connect to database



//connect to the database
$db = mysqli_connect('localhost', 'root', $password, 'users') or die("could not connect to database");
//if (mysqli_connect_error()){
  //die('Connect Error ('. mysqli_connect_errno() . ') '
  //. mysqli_connect_error());
//}



//Register User


if (isset($_POST['reg_user'])){
  //receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if(empty($username)) {array_push($errors, "username is required");}
if(empty($email)) {array_push($errors, "Email is required");}
if(empty($password_1)) {array_push($errors, "Password is required");}
if($password_1 != $password_2) {array_push($errors,"The two passwords do not match");}

//first check the database to make sure a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

//check if the user exists Already
if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already in use");
    }
  }

//Now lastly register the user with input from the form if all tests
//for username and email passed
if (count($errors) == 0) {
  $password = md5($password_1); /// encrypt the password before saving in the database

  $query = "INSERT INTO users (username, email, password)
    VALUES('$username', '$email', '$password')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  header('location: login.php');
}

}

//login user

if(isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if(empty($username)){
    array_push($errors, 'Username is required');
  }
  if(empty($password)) {
    array_push($errors, 'Password is required');
  }

  if(count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if(mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now loggin in";
      header('location: userHomepage.php');
    }else{
      array_push($errors, "Wrong username/password combination");
    }
  }
}

/*
// Inserting these values into the MySQL table
// we created above
$query = "insert into form_data (first_name, last_name, gender, age, city, submit_date)
  values ('" .$fname . "', '" .$lname . "', '" .$gender . "', " .$age . ", '" .$city . "', '" .$submitdate . "')";
$result = mysqli_query($db, $query);
// mysql_query() is a PHP function for executing
// MySQL queries
*/


?>
