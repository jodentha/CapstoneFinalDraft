?php
session_start();
include_once("playerStats.php");
?>
<html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stats</title>
  <link rel="stylesheet" type="text/css" href="/public/styles.css" />
</head>

<body>
  <div class="navbar">
    <a href="home.php">Home</a>
    <a class="login" href="index.php">Logout</a>
    <a class="active" href="stats.php">Stats</a>
    <a href="plans.php">Plans</a>
  </div>

  <?php
  $uname = $_SESSION["PlayerName"];
  $query = "SELECT Access FROM UserLogin WHERE PlayerName = '$uname'";
  $result1 = mysqli_query($conn, $query);
  $row1 = mysqli_fetch_assoc($result1);
  $num = $row1['Access'];
  if ($num == 1) {
  ?>

  <div style="overflow-x: auto" class="statsContainer">

    <table id="playerStats">
      <tr>
        <th>Player Name</th>
        <th>Course Name</th>
        <th>Round</th>
        <th>Tournament</th>
        <th>Total Strokes</th>
        <th>Date</th>
        <th>Hole</th>
        <th>Yards</th>
        <th>Par</th>
      </tr>
      <?php
      foreach ($fetchPlayerData as $row1) {
        if ($_SESSION['PlayerName'] === $row1['PlayerName']) {
          echo "<tr>";
          echo "<td>" . $row1['PlayerName'] . "</td>";
          echo "<td>" . $row1['Course'] . "</td>";
          echo "<td>" . $row1['Round'] . "</td>";
          echo "<td>" . $row1['IsTourny'] . "</td>";
          echo "<td>" . $row1['TotalStrokes'] . "</td>";
          echo "<td>" . $row1['Date'] . "</td>";
          echo "<td>" . $row1['Hole'] . "</td>";
          echo "<td>" . $row1['Yards'] . "</td>";
          echo "<td>" . $row1['Par'] . "</td>";

        }
      }
      ?>

    </table>
    <button type="button" class="btn" onclick="openPStats()">Add Player Stats</button>
    <button type="delete" class="btn cancel" onclick="openDelete()">Delete</button>
  </div>
  <div style="overflow-x: auto" class="popup" id="playerStatsForm">
    <form action="statEntry.php" method="post" class="form-container">
      <h1>Player Stats Entry</h1>

      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>

      <label for="Course"><b>Course Name</b></label>
      <input type="text" placeholder="Enter Course Name" name="Course" />

      <input type="checkbox" name="IsTourny">
      <label for="IsTourny"> Was This a Tournament?</label>


      <label for="Round"><b>Round</b></label>
      <input type="number" placeholder="Enter Rounds" name="Round" />

      <label for="TotalStrokes"><b>Strokes Gained Off-The-Tee</b></label>
      <input type="number" placeholder="Enter Total Strokes" name="TotalStrokes" />

      <label for="Date"><b>Date</b></label>
      <input type="date" name="Date">

      <label for="hole"><b>Hole</b></label>
      <input type="number" placeholder="Enter Hole" name="hole" />

      <label for="Yards"><b>Yards</b></label>
      <input type="number" placeholder="Enter Yards" name="yards" />

      <label for="par"><b>Par</b></label>
      <input type="number" placeholder="Enter Par" name="par" />

      <button type="submit" class="btn">Submit</button>
      <button type="button" class="btn cancel" onclick="closePStats()">Close</button>
    </form>
  </div>

  <div style="overflow-x: auto" class="popup" id="deleteStats">
    <form action="deleteStats.php" method="post" class="form-container">
      <h1>Delete Stats</h1>

      <label for="Course"><b>Course Name</b></label>
      <input type="text" placeholder="Enter Course Name" name="Course" />

      <label for="Hole"><b>Enter Date</b></label>
      <input type="date" placeholder="Date Hole" name="date" />

      <button type="submit" class="btn">Submit</button>
      <button type="button" class="btn cancel" onclick="closeDelete()">Close</button>
    </form>
  </div>

  <script>
    function openPStats() {
      document.getElementById("playerStatsForm").style.display = "block";
    }

    function openCStats() {
      document.getElementById("courseStatsForm").style.display = "block";
    }

function closePStats() {
  document.getElementById("playerStatsForm").style.display = "none";
}

function closeCStats() {
  document.getElementById("courseStatsForm").style.display = "none";
  addRow();
}

function openDelete() {
  document.getElementById("deleteStats").style.display = "block";
}

function closeDelete() {
  document.getElementById("deleteStats").style.display = "none";
}
</script>

<?php }else{?>
<div style="overflow-x: auto" class="statsContainer">

<table id="playerStats">
  <tr>
    <th>Player Name</th>
    <th>Course Name</th>
    <th>Round</th>
    <th>Tournament</th>
    <th>Total Strokes</th>
    <th>Date</th>
    <th>Hole</th>
    <th>Yards</th>
    <th>Par</th>
  </tr>
  <?php
  foreach ($fetchPlayerData as $row1) {
    if($_SESSION['searchedName'] === NULL){
      $_SESSION['searchedName'] = "";
    }
    if ($_SESSION['searchedName'] === $row1['PlayerName']) {
      echo "<tr>";
      echo "<td>" . $row1['PlayerName'] . "</td>";
      echo "<td>" . $row1['Course'] . "</td>";
      echo "<td>" . $row1['Round'] . "</td>";
      echo "<td>" . $row1['IsTourny'] . "</td>";
      echo "<td>" . $row1['TotalStrokes'] . "</td>";
      echo "<td>" . $row1['Date'] . "</td>";
      echo "<td>" . $row1['Hole'] . "</td>";
      echo "<td>" . $row1['Yards'] . "</td>";
      echo "<td>" . $row1['Par'] . "</td>";
    }
  }
  ?>

</table>
</div>
<?php }?>
</body>

</html>
