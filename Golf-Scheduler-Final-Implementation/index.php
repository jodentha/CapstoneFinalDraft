<?php
session_start();
session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Golf Scheduler</title>
<link rel="stylesheet" type="text/css" href="public/styles.css">
<link rel="stylesheet" type="text/css" href="public/calendar.css">


  </head>
  <body>
    <div class="navbar">
      <a class="active" href= "index.php">Home</a>
      <a class="login" onclick="openLogin()">Login</a>
    </div>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>
  </head>
  <body>
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
    <!--add action-->
    <div class="popup" id="loginForm">
      <form action="login.php" method="post" class="form-container">
        <h1>Login</h1>

        <?php if(isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label for="unsername"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required />

        <label for="pass"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required/>

        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn register" onclick="openRegistery()">Register</button>
        <button type="button" class="btn cancel" onclick="closeLogin()">Close</button>
    </form>
</div>



<div class="popup" id="registryForm">
  <form action="register.php" method="post" class="form-container" >
    <h1>Register</h1>

    <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
      <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <label for="firstName"><b>First Name</b></label>
    <?php if (isset($_GET['firstName'])) { ?>
    <input type="text" placeholder="Enter First Name" name="firstName" value="<?php echo $_GET['firstName']; ?>"><br>
    <?php }else{ ?>
               <input type="text"
                      name="firstName"
                      placeholder="Enter First Name"><br>
          <?php }?>

    <label for="lastName"><b>Last Name</b></label>
    <?php if (isset($_GET['lastName'])) { ?>
    <input type="text" placeholder="Enter Last Name" name="lastName" value="<?php echo $_GET['lastName']; ?>"><br>
    <?php }else{ ?>
               <input type="text"
                      name="lastName"
                      placeholder="Enter Last Name"><br>
          <?php }?>



    <label for="email"><b>Email</b></label>
    <?php if (isset($_GET['email'])) { ?>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $_GET['email']; ?>"><br>
    <?php }else{ ?>
               <input type="text"
                      name="email"
                      placeholder="Enter Email"><br>
          <?php }?>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required/>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password Again" name="rePassword" required/>

    <label class="check"><b>Player</b>
      <input type="checkbox" name="check">
      <span class="checkmark"></span>
    </label>

    <label class="check"><b>Coach</b>
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <button type="submit" class="btn">Submit</button>
    <button type="button" class="btn cancel" onclick="closeRegistry()">Close</button>
  </form>
</div>

<script>
  function openLogin() {
    document.getElementById("loginForm").style.display = "block";
  }

  function openRegistery(){
    document.getElementById("registryForm").style.display = "block";
    closeForm();
  }

  function closeLogin() {
    document.getElementById("loginForm").style.display = "none";
  }

  function closeRegistry(){
    document.getElementById("registryForm").style.display = "none";
  }
</script>
</body>
</html>
