<?php
include('database.php');
if (isset($_POST['playerName'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['playerName']);
    $sql = "DELETE FROM UserLogin WHERE PlayerName = '$uname'";
    if ($conn->query($sql) === TRUE) {
        header("Location: plans.php?Player has been deleted");
    } else {
        header("Location: plans.php?Error, player not deleted");
    }
}
