<?php
require 'session-check.php';
require 'connect.php';
$award = $_GET['award'];
$award2 = strtolower($_GET['award']);
$award2 = preg_replace("/\s+/","", $award2);
$_SESSION['award']=$award2;
?>
<html>

<head>
    <title>Nominations</title>
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="leaderboard.css" />
    <script src="jquery1.11.2.js"></script>
    <script src="search.js"></script>
    <script>


$(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="awardlist.php";
    });
});

    </script>
</head>

<body id='body'>
    <?php include 'session-check.php'; require 'connect.php'; ?>

    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png"></li>
            <li class="heading" id="heading">Award Nomination </li>
            <li class="heading"> >   <?php echo $award;?>   </li>
        </ul>
        <ul class="right">
            <li ><a href="logout.php">Logout</a></li>
            <li>You are Logged in as
                <?php echo $_SESSION['username']; ?> </li>
        </ul>
    </div>
<section class="mesasge">Select you Nominee</section>
    <div class="content">
<?php require 'search.php'?>

    </div>
<footer>
        <div class="valign-wrapper">Developed by Delta 2015</div>
    </footer>

</body>

</html>
