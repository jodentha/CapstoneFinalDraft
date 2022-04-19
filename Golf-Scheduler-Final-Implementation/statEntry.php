<?php
session_start();
include "database.php";

if (isset($_POST['Course']) && isset($_POST['Round'])
&& isset($_POST['TotalStrokes']) && isset($_POST['Date'])
&& isset($_POST['hole']) && isset($_POST['yards']) && isset($_POST['par'])) {

        function validate($data){
       $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
        $playerName = $_SESSION["PlayerName"];
        $course = validate($_POST['Course']);
                $round = validate($_POST['Round']);
                $totalStrokes = validate($_POST['TotalStrokes']);
                $date = validate($_POST['Date']);
        $hole = validate($_POST['hole']);
        $yards = validate($_POST['yards']);
        $par = validate($_POST['par']);
                $num = 0;

                $isTourny = $_POST['IsTourny'];

                if (isset($isTourny)) {
                        $num = 1;
                }

        $sql = "INSERT INTO PlayerStats(PlayerName, Course, IsTourny, Round, TotalStrokes, Date, Hole, Yards, Par) VALUES('$playerName', '$course', $num, '$round', '$totalStrokes', '$date', '$hole', '$yards', '$par')";
        $result = mysqli_query($conn, $sql);
           if ($result) {
                 header("Location: stats.php?success=You have successfuly submited your plans!");
                 exit();
           }else {
                        header("Location: stats.php?error=unknown error occurred");
                        exit();
           }

}
