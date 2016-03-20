
<?php
require 'config.php';
require 'connect.php';
require 'functions.php';
require 'admin-check.php';
?>
<html>

<head>
    <title>Admin Panel</title>
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
        </ul>
    </div>
    <div class="content">
        <div class="adminpanel">
            <?php
             $query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==0){
        ?>

        <input id ="startvoting" type="button" value="Start Voting" class="submit">
                <script>
        $(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="adminpanel.php";
    });
    $("#startvoting").on("click", function(){
                    window.location="startvoting.php";
                });
});

    </script>
            <?php
    }else{
        ?>
            <section class="message">Select an Award to Nominate</section>

<ul class="awards left">
    <div>
        <script>
            $(".message").html("Click on the Awards to See the Current Voting Status");


$(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="adminpanel.php";
    });
    $(".awards li").on("click", function(){
        var award = encodeURIComponent( $(this).text());
        window.location = "countvotes.php?award="+award;
    });
});

        </script>
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
        <?php
    }
            ?>

            </div>
 </div>
<div class="footer">
        <div class="valign-wrapper">© Nostalia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
</div>
</body>

</html>
