<?php

require 'session-check.php';
require 'connect.php';
require 'config.php';
require 'functions.php';
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
error_reporting(0);

$candidate = $_GET['candidate'];
$username = $_SESSION['username'];
$award=$_SESSION['award'];

$awardIndex = findAwardIndex($award, $awarddetails);
$awardFor = $awarddetails[$awardIndex][1];

$query ="UPDATE `voting`
 SET `$award`='$candidate'
 WHERE rollno='$username'";
        $db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");

$query="SELECT * FROM `$candidates` WHERE `no`=$candidate";
$result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
$row = $result->fetch_assoc();

$candidate = $row[$award];

if (strlen($awardFor)==1){
$candidate = $row[$award];
$query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$candidate'";
$result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
$student = $result->fetch_assoc();
$candidatename = $student['studentName'];
}else{
    $candidate = $row[$award];
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
}
$reply->awardFor = $awardFor;
$reply->candidate = $candidatename;
$reply->status='voted';
$reply->username=$username;
$reply->award=$award;
echo json_encode($reply);
?>
