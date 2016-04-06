<?php
require 'connect.php';
require 'config.php';
require 'functions.php';
require 'admin-check.php';

$award=$_GET['award'];
$_SESSION[ 'award']=$award;
?>
<html>

<head>
  <title>Nomination Status | Nostalgia 2016 </title>
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
        <li class="heading" id="heading">Admin: Award List </li>
        <li class="heading">> <?php echo $award;?> </li>
      </ul>
      <ul class="right">
        <li><a href="logout.php">Logout</a>
        </li><li>You are Logged in as Administrator </li>
        <li><a href="adminAwardList.php">Award List</a> </li>
      </ul>
    </div>
    <section class="message">Nominations Status</section>
    <div class="content">
      <ul class="candidates">
        <form action="selectCandidate.php" method="post">
          <input value="<?php echo $award ?>" hidden name="award">
        <?php
        $topNominations = topNominations ($award);
        $awardIndex = findAwardIndex($award, $awarddetails);
        $awardFor = $awarddetails[$awardIndex][1];

        for($i = 0; $i < count($topNominations->nominees); $i++){
          if (strlen($awardFor)==1){
            $rollNo = $topNominations->nominees[$i];
            $candidatename = getNameOf($rollNo);
            if (strcmp($candidatename,"")){
              ?>
              <li>
                <input type="checkbox" name="candidates[]" value="<?php echo $rollNo ?>">
                <?php $rowNo = $i + 1; echo $rowNo." : ".$candidatename." (".$rollNo.")";?> have got <?php echo $topNominations->nominations[$i]; ?>
                 Nominations
               </input>
              </li>
              <?php
            }
          }else{
            $candidate = array();
            $candidate = $topNominations->nominees[$i];
            $rollNo1 = $candidate['rollno1'];
            $rollNo2 = $candidate['rollno2'];

            $candidatename = array();
            $candidatename[0] = getNameOf($rollNo1);
            $candidatename[1] = getNameOf($rollNo2);

            if (strcmp($candidatename[0],"")){
              ?>
              <li>
                <input type="checkbox" name="candidates[]" value="<?php echo $candidate['rollno1']." ".$candidate['rollno2'] ?>">
                <?php $rowNo = $i + 1;echo $rowNo." : ".$candidatename[0]." (".$rollNo1.") & ".$candidatename[1]." (".$rollNo2.")"?> have got <?php echo $topNominations->nominations[$i]; ?>
                Nominations
              </input>
              </li>
              <?php
            }
          }
        }
        ?>
        <input type="submit" class="submit" value="Submit">
      </form>
      </ul>
    </div>
    <div class="footer">
      <div class="valign-wrapper">© Nostalgia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>
</body>

</html>
