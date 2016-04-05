<?php
require 'connect.php';
require 'config.php';
require 'functions.php';
require 'admin-check.php';
$candidatesArray = $_POST['candidates'];
$award = $_POST['award'];
$i = 1;
foreach ($candidatesArray as $candidate) {
  if ($i > 5){
    break;
  }
  $query = "SELECT * FROM `$candidates`  WHERE `no`='$i'";
  $result = $db->query($query) or die($db->error);
  if ($result->num_rows == 0){
    $query = "INSERT INTO `$candidates` (`no`) VALUES ('$i')";
    $result = $db->query($query) or die($db->error);
  }
 $query ="UPDATE `$candidates` SET `$award`='$candidate' WHERE `no`='$i'";
 $db->query($query) or die ($db->error);
 $i++;
}
 ?>
 <html>
 <head>
   <script>
    alert("Selected Candidates have been added to the candidates list");
    window.location = "countNominations.php?award=<?php echo $award?>";
   </script>
 </head>
 </html>
