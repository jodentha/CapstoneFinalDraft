<?php
include('database.php');
session_start();
if (isset($_POST['Course']) && isset($_POST['date'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = $_SESSION['PlayerName'];
    $course = validate($_POST['Course']);
    $date = validate($_POST['date']);
    $sql = "DELETE FROM PlayerStats WHERE PlayerName = '$uname' AND Course = '$course' AND Date = '$date'";
    if ($conn->query($sql) === TRUE) {
        header("Location: stats.php?Stat has been deleted");
    } else {
        header("Location: stats.php?Error, stat not deleted");
    }
}
