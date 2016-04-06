<?php
require 'session-check.php';
require 'connect.php';
require 'config.php';
require 'functions.php';
$award=$_GET['award'];
$_SESSION[ 'award']=$award;
$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==0){
        header("Location:index.php");
    }
$username  = $_SESSION['username'];
$awardIndex = findAwardIndex($award, $awarddetails);
$awardFor = $awarddetails[$awardIndex][1];
?>
<html>

<head>
    <title>Nominations | Nostalgia 2016</title>
    <link rel="stylesheet" href="style1.css" />
    <script src="jquery1.11.2.js"></script>
    <script>
        $(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="awardlist.php";
    });
            $(".candidates li").css({
                "font-family":"robotolight",
                "font-size":"17px",
                "margin":"20px"
            });

    $(".candidates li").on("click", function(){
        var candidate=$(this).attr('id');
        console.log(candidate);
        url = "voted.php?candidate="+candidate;
        console.log(candidate);
        $.ajax({
                url: url,
                method: 'GET'
            }).done(function (data) {
                data = JSON.parse(data);
                console.log(data);
                if (data.status == "voted") {
                    $(".message").html("Voted for " + data.candidate).css({
                        'color': "#2E7D32"
                    });
                } else {
                    $(".message").html("Error.").css('color', "#F44336");
                }
            }).fail(function () {
                $(".message").html("Error.").css('color', "#F44336");
            });
    });
});
            var award;
            award = '<?php echo $award;?>';

        </script>
</head>

<body id='body'>
  <div class="container">
    <?php include 'session-check.php'; require 'connect.php'; ?>

    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png">
            </li>
            <li class="heading" id="heading">Award Voting </li>
            <li class="heading"> >
                <?php echo $award;?> </li>
        </ul>
        <ul class="right">
            <li><a href="logout.php">Logout</a>
            </li>
            <li>You are Logged in as
                <?php echo $username; ?> </li>
        </ul>
    </div>
    <section class="message">
      <?php
      $sql = "SELECT * FROM `$voting` WHERE `rollno`='$username'";
      $votingResult = $db->query($sql) or die ('There was an error during Database Entry [' . $db->error . ']');
      if ($votingResult->num_rows == 1){
        $votingRow = $votingResult->fetch_assoc();
        $candidateIndex = $votingRow[$award];
        if (isset($candidateIndex)){
          $sql = "SELECT * FROM `$candidates` WHERE `no`='$candidateIndex'";
          $candidateResult = $db->query($sql) or die ('There was an error during Databsase Entry [' . $db->error . ']');
          $candidateRow = $candidateResult->fetch_assoc();
          $rollNo = $candidateRow[$award];
          if (strlen($awardFor)==1){
            $votedCandidate = getNameOf($rollNo);
          }else {
            $candidate = $row[$award];
            if (!$candidate){
              continue;
            }
            $candidate = explode(" ", $candidate);
            $candidatename = array();
            $candidatename[0] = getNameOf($candidate[0]);
            $candidatename[1] = getNameOf($candidate[1]);
            $votedCandidate = $candidatename[0]." & ".$candidatename[1];
          }
          echo "You have voted for <b>". $votedCandidate . "</b>. Select a candidate to change your vote.";
        }else {
          echo "Select your candidate";
        }
      }else{
        echo "Select your candidate";
      }
       ?>
    </section>
    <div class="content">
      <ul class="candidates">
        <?php
        $query="SELECT * FROM `$candidates`";
        $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
        $reply=array();$counter = 0;
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $rollNo = $row[$award];
            if (strlen($awardFor)==1){
              if (!$rollNo){
                continue;
              }
              $candidatename = getNameOf($rollNo);
              if (strcmp($candidatename,"")){
                ?>
                <li id="<?php echo $row['no']?>"><?php echo $row['no'].":".$candidatename?></li>
                <?php
              }
            }else{
              $candidate = $row[$award];
              if (!$candidate){
                continue;
              }
              $candidate = explode(" ", $candidate);
              $candidatename = array();
              $candidatename[0] = getNameOf($candidate[0]);
              $candidatename[1] = getNameOf($candidate[1]);
              if (strcmp($candidatename[0],"")){
                ?>
                <li id="<?php echo $row['no']?>"><?php echo $row['no']." : ".$candidatename[0] ?> & <?php echo $candidatename[1] ?> </li>
                <?php
              }
            }
          }
        }
        ?>
      </ul>
    </div>
    <div class="footer">
        <div class="valign-wrapper">© Nostalgia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>

</body>

</html>
