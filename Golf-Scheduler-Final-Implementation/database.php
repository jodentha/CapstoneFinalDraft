<?php
$hostName = "mattflow.dev";
$userName = "root";
$password = "9pV44!8yH82Yu5";
$databaseName = "Capstone2022Golf";
 $conn = new \mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
