<?php
include('database.php');
if (isset($_POST['planName'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['planName']);
    $sql = "DELETE FROM PracticePlan WHERE PlanName = '$uname'";
    if ($conn->query($sql) === TRUE) {
        header("Location: plans.php?Plan has been deleted");
    } else {
        header("Location: plans.php?Error, plan not deleted");
    }
}
