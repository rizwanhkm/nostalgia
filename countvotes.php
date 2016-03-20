<?php
require 'connect.php';
require 'config.php';
require 'functions.php';
require 'admin-check.php';

$award=$_GET['award'];
$_SESSION[ 'award']=$award;
$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();
    if ($row['value']==0){
        header("Location:adminpanel.php");
    }

?>
<html>

<head>
    <title>Vote Status</title>
    <link rel="stylesheet" href="style1.css" />
    <script src="jquery1.11.2.js"></script>
    <script>
        $(document).ready(function () {
            $("#heading").on("click", function () {
                window.location = "adminpanel.php";
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
    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png"> </li>
            <li class="heading" id="heading">Admin Panel </li>
            <li class="heading"> ><?php echo $award;?> </li>
        </ul>
        <ul class="right">
            <li><a href="logout.php">Logout</a>
            </li><li>You are Logged in as Administrator </li>
        </ul>
    </div>
    <section class="message">Voting Status</section>
    <div class="content">
         <ul class="candidates">
             <?php
$query="SELECT * FROM `$candidates`";
$result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
$reply=array();$counter = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $awardIndex = findAwardIndex($award, $awarddetails);
        $awardFor = $awarddetails[$awardIndex][1];
        $candidate = $row[$award];
        $candidateindex = $row['no'];
        $query="SELECT * FROM `$voting` WHERE `$award`=$candidateindex";
        $result_votes = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
        $noofvotes=$result_votes->num_rows;

        if (strlen($awardFor)==1){
            $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate'";
            $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
            $student = $result->fetch_assoc();
            $candidatename = $student['studentName'];
            if (strcmp($candidatename,"")){
            ?>
            <li><?php echo $row['no']." : ".$candidatename?> have got <?php echo $noofvotes; ?> Votes</li>
            <?php
            }
            }else{
                $candidate = explode(" ", $candidate);

                $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate[0]'";
                $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
                $student = $result->fetch_assoc();
                $candidatename[0] = $student['studentName'];

                $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate[1]'";
                $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
                $student = $result->fetch_assoc();
                $candidatename[1] = $student['studentName'];
                $candidatename = $candidatename[0]." & ".$candidatename[1];

                if (strcmp($candidatename[0],"")){
            ?>
                   <li><?php echo $row['no']." : ".$candidatename?> have got <?php echo $noofvotes; ?> Votes</li>

            <?php
                }
            }
    }
}

?>

</ul>

    </div>
    <div class="footer">
            <div class="valign-wrapper">© Nostalia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>

</body>

</html>
