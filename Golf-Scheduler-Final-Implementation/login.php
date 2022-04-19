<?php

session_start();

include "database.php";

if (isset($_POST['username']) && isset($_POST['pass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['pass']);
    $pass = md5($pass);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM UserLogin WHERE PlayerName='$uname' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['PlayerName'] === $uname && $row['Password'] === $pass) {

                echo "Logged in!";

                $_SESSION['PlayerName'] = $row['PlayerName'];

                header("Location: home.php");
                exit();
            } else {

                header("Location: index.php?error=Incorect User name or password");

                exit();
            }
        } else {

            header("Location: index.php?error=Incorect User name or password");

            exit();
        }
    }
} else {

    header("Location: index.php");

    exit();
}
