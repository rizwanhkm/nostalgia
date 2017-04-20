
<?php
require 'config.php';
require 'connect.php';
require 'functions.php';
require 'admin-check.php';
$status = "";

$query="SELECT * FROM `$admin` where `settings` ='voting' ";
$result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
$row = $result->fetch_assoc();
if ($row['value']==0){
  $status = "countNominations.php";
  $voting = 0;
}else{
  $status = "countVotes.php";
  $voting = 1;
}
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
        <li class="heading" id="heading">Admin : Awards List </li>
      </ul>
      <ul class="right">
        <li ><a href="logout.php">Logout</a></li>
        <li>You are Logged in as Admininistrator </li>
        <li><a href = "adminSettings.php">Settings</a></li>
        </ul>
      </div>
      <div class="content">
        <div class="container">
          <?php
          if ($voting == 0  ){
            ?>
              <section class="message">Select an award to see current Nomination status</section>
            <?php
          }else {
            ?>
              <section class="message">Select an award to see current Vote status</section>
            <?php
          }
           ?>

          <ul class="awards">
            <div>
              <script>

              $(document).ready(function () {
                $("#heading").on("click", function(){
                  window.location ="adminAwardList.php";
                });
                $(".awards li").on("click", function(){
                  var award = encodeURIComponent( $(this).text());
                  window.location = "<?php echo $status ?>?award="+award;
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


        </div>
      </div>
      <div class="footer">
        <div class="valign-wrapper">© Nostalgia 2017 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
      </div>
    </div>
  </body>

  </html>
