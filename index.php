<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"/>
    <title>Homework 2</title>
</head>
<body>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hw2p1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    if(isset($_REQUEST["submit"])){
      // Variables for the output and the web form below.
      $out_value = "";
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      // The following is the core part of this script where we connect PHP
      // and SQL.
      // Check that the user entered data in the form.
      if(!empty($username) && !empty($password)){
        // If so, prepare SQL query with the data.
        $sql_query = "INSERT INTO users (username, password)
        VALUES('$username', '$password')";

        if (!$conn -> query($sql_query)) {
          echo("Error description: " . $conn -> error);
        }
      }
        $out_value = "Submit test";
      }

    $conn->close();
  ?>


    <div class="page-container">
        <form action="" method="GET">
            <h1>Register Now!</h1>
                <h3>Username</h3><input type="text" name="username" placeholder="Username">
                <h3>Password</h3><input type="text" name="password" placeholder="Password">
                <button name="submit"> Submit </button>
                <p><?php 
              if(!empty($out_value)){
                echo $out_value;
              }
            ?></p>
            </div>

        </form>
    </div>
</body>
</html>