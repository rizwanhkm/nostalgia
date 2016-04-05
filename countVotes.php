<?php
require 'connect.php';
require 'config.php';
require 'functions.php';
require 'admin-check.php';

$award=$_GET['award'];
$_SESSION['award']=$award;
?>
<html>

<head>
    <title>Vote Status | Nostalgia 2016 </title>
    <link rel="stylesheet" href="style1.css" />
    <script src="jquery1.11.2.js"></script>
    <script>
        $(document).ready(function () {
            $("#heading").on("click", function () {
                window.location = "adminAwardList.php";
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
            <li class="heading" id="heading">Admin : Award List </li>
            <li class="heading">> <?php echo $award;?> </li>
        </ul>
        <ul class="right">
            <li><a href="logout.php">Logout</a>
            </li><li>You are Logged in as Administrator </li>
            <li><a href="adminAwardList.php">Award List</a> </li>

        </ul>
    </div>
    <section class="message">Vote Status</section>
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
          if (!$candidate){
            continue;
          }
            $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate'";
            $result_student = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
            $student = $result_student->fetch_assoc();
            $candidatename = $student['studentName'];
            if (strcmp($candidatename,"")){
            ?>
            <li><?php echo $row['no']." : ".$candidatename?> have got <?php echo $noofvotes; ?> Votes</li>
            <?php
            }
            }else{
                if (!$candidate){
                  continue;
                }
                $candidate = explode(" ", $candidate);
                $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate[0]'";
                $result_student = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
                $student = $result_student->fetch_assoc();
                $candidatename[0] = $student['studentName'];

                $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate[1]'";
                $result_student = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
                $student = $result_student->fetch_assoc();
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
            <div class="valign-wrapper">© Nostalgia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>

</body>

</html>
