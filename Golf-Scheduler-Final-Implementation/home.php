?php
session_start();
include('database.php');
include('playerStats.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golf Scheduler</title>
    <link rel="stylesheet" type="text/css" href="public/styles.css">
</head>

<body>
    <div class="navbar">
        <a class="active" href="home.php">Home</a>
        <a class="login" href="index.php">Logout</a>
        <a href="stats.php">Stats</a>
        <a href="plans.php">Plans</a>
    </div>
    <div class="about-section">
      <h1>About The Team</h1>
      <p class="text">Kent State Men's Golf Team is a division 1 team comprised of 12 golfers and 2 coaches. The team has made 36 appearances in the Men's championships, with 3 victories in regionals.
        The team regularly uses the Windmill Lakes Golf Club for practices and tournaments. The goal of the scheduler was to provide players an easy way to look at and enter player statistics
        and also allow the coaches an easy way to write and display practice plans. This was done by a team comprising
        Jordan Odenthal, Jakub Kominar, Mckenzie Sellers, Nick Flowers and Jared Wilson.
      </p>
      <p></p>
      <div class= butt>
        <button class="btn index"><a  href="https://kentstatesports.com/sports/mens-golf" style="text-decoration: none;">More about the Team</a> </button>
        <button class="btn index"><a  href="https://github.com/jodentha/CapstoneFinalDraft/tree/main" style="text-decoration: none;">Project Github</a></button>
        </div>
    </div>
    <hr class="hr-shadow">
<h2>Current Practice Plans</h2>
    <div style="overflow-x:auto" class="planscontainer">
        <table class="planTable">
            <tr>
                <th>Plan Name</th>
                <th>Plan Date</th>
                <th>Desc.</th>
            </tr>
            <?php
            foreach ($fetchPlansData as $row1) {
                echo "<tr>";
                echo "<td>" . $row1['PlanName'] . "</td>";
                echo "<td>" . $row1['PlanDate'] . "</td>";
                echo "<td>" . $row1['Description'] . "</td>";
            }
            ?>
        </table>

    </div>
    <hr class="hr-shadow">
    <div class="column">
      <div class="card">
        <div class="container">
          <h2 class>Jon Mills</h2>
          <p class="title">Head Coach</p>
          <img src="https://kentstatesports.com/images/2018/8/29/J_MillsWEB.jpg?width=300" alt="Jon" style="width:50%">
          <p>Head coach since July 2019 after coach Herb Page Retired.</p>
          <p>Email:<a href ="mailto:jmills1@kent.edu">jmills1@kent.edu</a></p>
          <p>Phone:330-672-4629</p>
          </div>
      </div>
  </div>
    <div class="column">
      <div class="card">
        <div class="container">
          <h2>Ryan Yip</h2>
          <p class="title">Assistant Coach</p>
          <img src="https://kentstatesports.com/images/2019/9/10/Ryan_Yip_WEB.jpg?width=300" alt="Ryan" style="width:50%">
          <p>Former Canadian professional golfer who came back to the program in August 2019.</p>
          <p>Email:<a href ="mailto:ryip@kent.edu">ryip@kent.edu</a></p>
          <p>Phone:330-672-4629</p>
        </div>
      </div>
    </div>
</body>

</html>
