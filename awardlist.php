<?php
require 'session-check.php';
require 'connect.php';
require 'config.php';
$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==1){
        header("Location:awardlistvoting.php");
    }
    if (isFinalYear($username)){
        header("Location:logout.php");
    }

?>
<html>

<head>
    <title>Award Nominations</title>
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="leaderboard.css" />
    <script src="jquery1.11.2.js"></script>
    <script>


$(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="awardlist.php";
    });
    $(".awards li").on("click", function(){
        var award = encodeURIComponent( $(this).text());
        window.location = "nominate.php?award="+award;
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
            <li class="heading" id="heading"a>Award Nomination </li>
        </ul>
        <ul class="right">
            <li ><a href="logout.php">Logout</a></li>
            <li>You are Logged in as
                <?php echo $_SESSION['username']; ?> </li>
        </ul>
    </div>
<section class="message">Select an Award to Nominate</section>
    <div class="content">
<ul class="awards left">
    <div>
    <?php
        for($i=0;$i<count($awarddetails);$i++){
            $award = strtolower($awarddetails[$i][0]);
            $award2=$awarddetails[$i][0];
            $award = preg_replace("/\s+/","", $award);
            $image = "<img src ='./images/$award.jpg'>";
            echo "<li><img src='./images/award.png'><br>$award2</li>";
        }
?></div>
        </ul>

    </div>
    <div class="footer">
            <div class="valign-wrapper">© Nostalia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>

</body>

</html>
