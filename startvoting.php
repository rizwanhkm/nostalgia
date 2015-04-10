<?php
require 'config.php';
require 'connect.php';
require 'functions.php';
require 'admin-check.php';


//Setting to Voting Time.
$query ="UPDATE `$admin`
 SET `value`='1'
 WHERE `settings`='voting'";
$db->query($query) or die ("{ 'status':''error','errorcode': '$db->error' }");

//Populating Candidate List
for ($i=0; $i<count($awarddetails);$i++){
    $award = $awarddetails[$i][0];
    $awardFor= $awarddetails[$i][1];
    $len = strlen($awardFor);
    if ($len==1){
        $nominees = topNominations($award);
        echo "<br>$award:";
        print_r($nominees);
        $totalnominees = count($nominees->nominations)-1;
        for ($j = 0; ( ($j < 5) && ($j < $totalnominees) ); $j++){
            $candidate = $nominees->nominees[$j];
            $candidateindex=$j+1;
            $query ="UPDATE `$candidates` SET `$award`='$candidate' WHERE `no`='$candidateindex'";
            echo "<br>$query";
            $db->query($query) or die ($db->error);
        }
    }else if ($len==2){
        $nominees = topNominations($awarddetails[$i][0]);
        echo "<br>$award";
        print_r($nominees);
        $totalnominees = count($nominees->nominations)-1;
        echo $totalnominees;
        for ($j = 0; ( ($j < 5) && ($j < $totalnominees) ); $j++){
            $candidate = $nominees->nominees[$j]['rollno1']." ".$nominees->nominees[$j]['rollno2'];
            $candidateindex=$j+1;
            $query ="UPDATE `$candidates` SET `$award`='$candidate' WHERE `no`='$candidateindex'";
            echo "<br>$query";
            $db->query($query) or die ($db->error);
        }
    }

}



?>
