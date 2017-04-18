<?php
require 'session-check.php';
require 'functions.php';
require 'connect.php';
require 'config.php';
$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==1){
        header("Location:awardlistvoting.php");
    }
    $username = $_SESSION['username'];
    if (!isFinalYear($username)){
        header("Location:logout.php");
    }


?>
<html>

<head>
    <title>My Nominations | Nostalgia 2017</title>
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="leaderboard.css" />
    <script src="jquery1.11.2.js"></script>
    <script>


$(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="mynominations.php";
    });
    $(".candidates li").css({
      "font-family":"robotolight",
      "font-size":"17px",
      "margin":"20px"
    });

});

    </script>
</head>

<body id='body'>
  <div class="container">
    <?php include 'session-check.php'; require 'connect.php'; ?>

    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png"></li>
            <li class="heading" id="heading"a>My Nominations </li>
        </ul>
        <ul class="right">
            <li ><a href="logout.php">Logout</a></li>
            <li>You are Logged in as
                <?php echo $_SESSION['username']; ?> </li>
        </ul>
    </div>
<section class="message"><b><u>List of nominations you have submitted</b></u></section>
    <div class="content">
<ul class="candidates">

    <?php
        $mynoms = getMyNominations($username);

        foreach ($mynoms as $key => $value) {
        if($value && $key != "rollno")
        {
         $name = getNameOf($value);
         echo "<li>$key - $value ($name)</li>";
        }
        }
    ?>
        </ul>

    </div>
    <div class="footer">
            <div class="valign-wrapper">© Nostalgia 2017 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>

</body>

</html>
