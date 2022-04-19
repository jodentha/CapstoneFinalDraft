<?php
include('database.php');
session_start();
    if(isset($_POST['search'])){

        function validate($data){
            $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
             }
        $name = validate($_POST['search']);
        $_SESSION['searchedName'] = $name;
        header("Location: stats.php?Success");
    }
?>
