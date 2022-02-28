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
      $out_value = "";
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      if(!empty($username) && !empty($password)){
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
            <h1>Log In</h1>
                <h3>Username</h3><input type="text" name="username_login" placeholder="Username">
                <h3>Password</h3><input type="text" name="password_login" placeholder="Password">
                <button name="login"> Login </button>
                <p><?php 
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "hw2p1";

                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }

                if(isset($_REQUEST["login"])){
                  $username_login = $_REQUEST['username_login'];
                  $password_login = $_REQUEST['password_login'];



                  $sql_query = " SELECT COUNT(*) AS valid FROM `users` WHERE `username` = '$username_login' and `password` = '$password_login' ";


                  $check_user = mysqli_query($conn, $sql_query);  

                  $row = mysqli_fetch_assoc($check_user);

                  if ($row['valid'] == "1") {
                    $song_query = " SELECT `song` FROM `ratings` WHERE `username` = '$username_login' ";
                    $song_results = mysqli_query($conn, $song_query);  
                    foreach($song_results as $row) {
                      echo '<p>'.$row['song'] .'</p>';
                    }
                  }
                  else {
                    echo 'Incorrect Password or Username';
                  }
                  
                    
                }

                  
            ?></p><br>
            </div>
        </form>
    </div>
</body>
</html>