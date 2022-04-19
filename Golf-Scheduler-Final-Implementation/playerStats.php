<?php
include_once("database.php");


$db= $conn;

$tableName1="PlayerStats";
$columns1= ['PlayerName', 'Course','IsTourny','Round','TotalStrokes','Date', 'Hole', 'Yards', 'Par'];
$fetchPlayerData = fetch_data($db, $tableName1, $columns1);
$tableName2="CourseInfo";
$columns2= ['Course', 'Hole','Par','Yards'];
$fetchCourseData = fetch_data($db, $tableName2, $columns2);
$tableName3 = "UserLogin";
$columns3=['PlayerName', 'Email', 'Password', 'Access'];
$fetchUserData = fetch_data($db, $tableName3, $columns3);
$tableName4= "PracticePlan";
$columns4= ['PlanName', 'PlanDate', 'Description'];
$fetchPlansData= fetch_data($db, $tableName4, $columns4);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "One of the table names are empty";
}else{



$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName";
$result = $db->query($query);

if($result== true){
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found";
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>
