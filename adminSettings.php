
<?php
require 'config.php';
require 'connect.php';
require 'functions.php';
require 'admin-check.php';
?>
<html>

<head>
  <title>Admin Panel | Nostalgia 2017</title>
  <link rel="stylesheet" href="style1.css" />
  <script src="jquery1.11.2.js"></script>

</head>

<body id='body'>
  <div class="container">

    <div class="nav">
      <ul class="left">
        <li><img src="./images/nostlogo.png"></li>
        <li class="heading" id="heading">Admin Panel </li>
      </ul>
      <ul class="right">
        <li ><a href="logout.php">Logout</a></li>
        <li>You are Logged in as Admininistrator </li>
        <li><a href="adminAwardList.php">Award List</a> </li>
      </ul>
    </div>
    <div class="content">
      <div class="adminpanel">
        <input id ="startvoting" type="button" value="Start Voting" class="submit"><br>
        <input id ="stopvoting" type="button" value="Stop Voting" class="submit">
        <script>
        $(document).ready(function () {
          $("#heading").on("click", function(){
            window.location ="adminSettings.php";
          });
          $("#startvoting").on("click", function(){
            window.location="startvoting.php?voting=1";
          });
          $("#stopvoting").on("click", function(){
            window.location="startvoting.php?voting=0";
          });
        });

        </script>

      </div>
    </div>
    <div class="footer">
      <div class="valign-wrapper">© Nostalgia 2017 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>
</body>

</html>
