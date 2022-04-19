<?php
session_start();
include "database.php";

if (isset($_POST['planName']) && isset($_POST['planDate'])
    && isset($_POST['description'])) {

        function validate($data){
       $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }

        $planName = validate($_POST['planName']);
        $planDate = validate($_POST['planDate']);
        $description = validate($_POST['description']);

        $sql = "INSERT INTO PracticePlan(PlanName, PlanDate, Description) VALUES('$planName', '$planDate', '$description')";
        $result = mysqli_query($conn, $sql);
           if ($result) {
                 header("Location: plans.php?success=You have successfuly submited your plans!");
                 exit();
           }else {
                        header("Location: plans.php?error=unknown error occurred");
                        exit();
           }

}
