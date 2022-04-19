<?php
session_start();
include "database.php";

if (isset($_POST['firstName']) && isset($_POST['password'])
    && isset($_POST['lastName']) && isset($_POST['rePassword'])
    && isset($_POST['email'])) {

        function validate($data){
       $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }

        $uname = validate($_POST['firstName']) . ' ' . validate($_POST['lastName']);
    $email = validate($_POST['email']);
        $pass = validate($_POST['password']);
        $rePass = validate($_POST['rePassword']);
        $user_data = 'uname='. $uname. '&email='. $email;
  $num = 2;

  $var = $_POST['check'];
  if(isset($var)){
    $num = 1;
  }

  $_SESSION['access'] = $num;

        if (empty($uname)) {
                header("Location: index.php?error=User Name is required&$user_data");
            exit();
        }else if(empty($pass)){
        header("Location: index.php?error=Password is required&$user_data");
            exit();
        }
        else if(empty($rePass)){
        header("Location: index.php?error=Re Password is required&$user_data");
            exit();
        }

        else if(empty($email)){
        header("Location: index.php?error=Name is required&$user_data");
            exit();
        }

        else if($pass !== $rePass){
        header("Location: index.php?error=The confirmation password  does not match&$user_data");
            exit();
        }

        else{

                // hashing the password
        $pass = md5($pass);

            $sql = "SELECT * FROM UserLogin WHERE PlayerName='$uname' ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                        header("Location: index.php?error=The username is taken try another&$user_data");
                exit();
                }else {
           $sql2 = "INSERT INTO UserLogin(PlayerName, Email, Password, Access) VALUES('$uname', '$email', '$pass', '$num')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
            header("Location: home.php?success=Your account has been created successfully");
            exit();
      }else {
                   header("Location: index.php?error=unknown error occurred&$user_data");
                   exit();
      }
           }
   }

}else{
   header("Location: index.php");
   exit();
}
