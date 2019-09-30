Initialization of database and connecting database to a website



**1** Create HTML, CSSS, JavaScript, PHP pages
**2** Add form and input fields to HTML FILE

      <form class="submitForm" action="connect.php" method="post" onsubmit="return validateForm()">
        <span>username :</span>
        <input type="text" id="nameInput" name="username" value="" required><br/><br/>

        <span>password :</span>
        <input id="bidsInput" type="number" name="fbids" value=""> </input>

        <button type="button" onclick="myFunction()">Submit</button>
      </form>

**3** Add script and link to header for JavaScript and class


**4** Create username and password variables in PHP file
      $username = filter_input(INPUT_POST, 'username');
      $password = filter_input(INPUT_POST, 'password');


**5** Create if, else statement to test username and password for a value
      if(!empty($username)){
        if(!empty($password)){
          $host="localhost";
          $dbusername = root;
          $dbpassword= "";
          $dbname = "users";
        }
        else{
          echo "password should not be empty";
          die();
        }
        else{
          echo "username should not be empty"
          die();
        }
      }

**6** Create A connection to the database
      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
      if(mysqli_connect_error()){
        die()'connect error ('.mysqli_connect_errno() . ') '
          . mysqli_connect_error());
      } else{
        $sql = "INSERT INTO account (username, password)
        values ('$username', '$password')";
        if($conn->query($sql)){
          echo "new record is inserted sucessfully";
        }
        else {
          echo "Error:". $sql . "<br>" . $conn->error;
        }
        $conn->close();
      }
