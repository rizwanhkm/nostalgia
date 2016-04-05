<?php
require 'config.php';
require 'connect.php';
require 'functions.php';
require 'admin-check.php';

$voting = $_GET['voting'];

//Setting to Voting Time.
$query ="UPDATE `$admin`
 SET `value`='$voting'
 WHERE `settings`='voting'";
$db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");
if ($voting == 1){
  $status = "Started";
}else{
  $status = "Stoped";
}
?>
<html>
<head>
  <script>
    alert("Voting <?php echo $status ?>");
    window.location ='adminSettings.php';
  </script>
</head>
</html>
