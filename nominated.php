<?php

require 'session-check.php';
require 'connect.php';
require 'config.php';
require 'functions.php';
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
error_reporting(0);

$nominee1 = $_GET['rollno1'];
$nominee2 = $_GET['rollno2'];
$username = $_SESSION['username'];
$award=$_SESSION['award'];
$column="";
$index = findAwardIndex($award,$awarddetails);
if (strlen($awarddetails[$index][1])==1){
        $column=$award;
            $reply->nominee=$nominee1;

    $query ="UPDATE `$nomination`
 SET `$award`='$nominee1'
 WHERE rollno='$username'";
        $db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");
}else {
    if (strlen($nominee1)>1){
        $column=$award."_1";
        $reply->nominee=$nominee1;
        $query ="UPDATE `$nomination`
 SET `$column`='$nominee1'
 WHERE rollno='$username'";
        $db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");
    }else if (strlen($nominee2)>1){
        $column=$award."_2";
        $reply->nominee=$nominee2;
        $query ="UPDATE `$nomination`
 SET `$column`='$nominee2'
 WHERE rollno='$username'";
        $db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");
    }
}
$reply->status='nominated';
$reply->username=$username;
$reply->award=$column;
echo json_encode($reply);
?>
