<?php
session_start();
include('database.php');
include('playerStats.php');
$uname = $_SESSION["PlayerName"];
$query = "SELECT Access FROM UserLogin WHERE PlayerName = '$uname'";
$result1 = mysqli_query($conn, $query);
$row1 = mysqli_fetch_assoc($result1);
$num = $row1['Access'];
if ($num == 1) {
  header("location:home.php?error=Unauthorized access.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plans</title>
  <link rel="stylesheet" type="text/css" href="public/styles.css">

</head>

<body>
  <div class="navbar">
    <a href="home.php">Home</a>
    <a class="login" href="index.php">Logout</a>
    <a href="../stats.php">Stats</a>
    <a class="active" href="plans.php">Plans</a>
  </div>

  <div class="createPlans">
    <form action="submitPlans.php" method="post" class="form-container">

      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>

      <label for="planName"><b>Plan Name</b></label>
      <input type="text" placeholder="Enter Plan Name" name="planName" />

      <label for="planDate"><b>Plan Date</b></label>
      <input type="date" placeholder="Enter Plan Date" name="planDate" />

      <label for="description"><b>Description</b></label>
      <textarea name="description" cols="30" rows="10" placeholder="Enter Description Here"></textarea>

      <button type="submit" class="btn" onclick="">Submit</button>
    </form>
    <button type="delete" class="btn cancel" onclick="openPdelete()">Delete Plans</button>
  </div>
  <div class="viewStudents">
    <label class="players" for="Players"><b>Players</b></label>
    <ul class="playerList" style="overflow-x: auto">
      <?php
      foreach ($fetchUserData as $row1) {
        echo "<li style =\"padding:5px\"><b>". $row1['PlayerName'] . "<b></li>";
      }
      ?>
    </ul>
    <form action="getName.php" method="post" class="form-container">
      <label for="search"><b>Search</b></label>
      <input type="text" placeholder="Enter Player Name" name="search">
      <button type="submit" class="btn">Submit</button>
    </form>
    <button class="btn cancel" onclick="openDelete()">Delete Player</button>
  </div>

  <div class="popup" id="deletePlayer">
    <form action="delete.php" method="post" class="form-container">
      <h1>Delete Player</h1>

      <label for="playerName"><b>Enter Player To Delete</b></label>
      <input type="text" placeholder="Player Name" name="playerName" required />

      <button type="submit" class="btn">Submit</button>
      <button type="button" class="btn cancel" onclick="closeDelete()">Close</button>
    </form>
  </div>

  <div class="popup" id="deletePlan">
  <form action="deletePlans.php" method="post" class="form-container">
    <h1>Delete Plan</h1>

    <label for="planName"><b>Enter Plan To Delete</b></label>
    <input type="text" placeholder="Plan Name" name="planName"/>

    <button type="submit" class="btn">Submit</button>
    <button type="button" class="btn cancel" onclick="closePdelete()">Close</button>
  </form>
</div>
  <script>
    function openDelete() {
      document.getElementById("deletePlayer").style.display = "block";
    }
    function openPdelete() {
    document.getElementById("deletePlan").style.display = "block";
    }

    function closeDelete() {
      document.getElementById("deletePlayer").style.display = "none";
    }
    function closePdelete() {
    document.getElementById("deletePlan").style.display = "none";
    }

    function openTable() {
      document.getElementById("table").style.display = "block";
    }

    function closeTable() {
      document.getElementById("table").style.display = "none";
    }
  </script>
</body>

</html>
