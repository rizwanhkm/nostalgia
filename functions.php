<?php

function findAwardIndex($award,$awarddetails){
    $index;
    for($i=0;$i<count($awarddetails);$i++){
            if (strcmp($awarddetails[$i][0],$award)==0){
                $index=$i;
                break;
            }
    }
    return $index;
}
function isFinalYear($username){
    require 'connect.php';
    require 'config.php';
    $query="SELECT * FROM `$rollnodetails` where `rollNo` ='$username'";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    // echo $query;
    // echo $username;
    // echo $result->num_rows;
    if ($result->num_rows==0){
         return 0;
     }else{
         return 1;
     }
}

function isAdmin($adminusernamecheck, $adminpasswordcheck){

    require 'connect.php';
    require 'config.php';
    $query="SELECT * FROM `$admin` where `settings` ='username'";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();
    $adminuser = $row['value'];
    $query="SELECT * FROM `$admin` where `settings` ='password'";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();
    $adminpassword = $row['value'];
    if ($result->num_rows==0){
         return 0;
     }else{
        if (strcmp($adminuser,$adminusernamecheck)==0){

            if(strcmp($adminpassword,$adminpasswordcheck)==0){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
}

function topNominations($award){
    require 'connect.php';
    require 'config.php';
    $index = findAwardIndex($award,$awarddetails);
    $awardFor = $awarddetails[$index][1];
    $nominations=array();
    $nominations[0]="";
    $counter=1;
    $count=array();
    $count[0]=0;
    if (strlen($awardFor)==1){
         $query="SELECT * FROM `$nomination`";
         $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
         while($row = $result->fetch_assoc()) {
             if (!$row[$award]){
                 continue;
             }
             $key = array_search($row[$award],$nominations);
            //  echo $key. "found for $row[$award]<br>";
            //  print_r($nominations);
            //  echo "<br>";
            //  print_r($count);
            //  echo "<br>";
             if (!($key == "")) {
                 $count[$key]++;
             }else{
                 $nominations[$counter] = $row[$award];
                 $count[$counter++] = 1;
             }
         }
         for ($i=0;$i<count($count);$i++){
             for ($j=$i+1; $j<count($count);$j++){
                 if ($count[$j]>$count[$i]){
                     $temp = $count[$j];
                     $count[$j]=$count[$i];
                     $count[$i]=$temp;
                     $temp = $nominations[$j];
                     $nominations[$j]=$nominations[$i];
                     $nominations[$i]=$temp;
                 }
             }
         }
     } else {
         $query="SELECT * FROM `$nomination`";
         $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
         $pair =array(
                    ('rollno1') => "",
                    ('rollno2') => ""
                );
        $nominations[0]=$pair;
        $count[0]=0;
         while($row = $result->fetch_assoc()) {
             $found=0;
             $column=$award."_1";
              if (!$row[$column]){
                 continue;
             }
             $keys1 = array_keys(array_column($nominations,'rollno1'),$row[$column]);
             $column=$award."_2";
              if (!$row[$column]){
                 continue;
             }
             $keys2 = array_keys(array_column($nominations,'rollno2'),$row[$column]);
             $key = array_keys(array_intersect($keys1,$keys2));
             if (array_key_exists(0,$key)){
                 $key= $keys1[$key[0]];
             }else {
                 $key=0;
             }
             if($key>0){
                  $found=1;
              }else{
                $column=$award."_1";
                $keys1 = array_keys(array_column($nominations,'rollno2'),$row[$column]);
                $column=$award."_2";
                $keys2 = array_keys(array_column($nominations,'rollno1'),$row[$column]);
                $key = array_keys(array_intersect($keys1,$keys2));
                if (array_key_exists(0,$key)){
                 $key= $keys1[$key[0]];
             }else {
                 $key=0;
             }
                if ($key>0){
                     $found=1;
                 }
             }
            if ($found){
                $count[$key]++;
                $column=$award."_1";
                $rollno1 = $row[$column];
                $column=$award."_2";
                $rollno2 = $row[$column];
                $pair =array(
                    ('rollno1') => $rollno1,
                    ('rollno2') => $rollno2
                );
            }else{
                $column=$award."_1";
                $rollno1 = $row[$column];
                $column=$award."_2";
                $rollno2 = $row[$column];
                $pair =array(
                    ('rollno1') => $rollno1,
                    ('rollno2') => $rollno2
                );
                $nominations[$counter]=$pair;
                $count[$counter]=1;
                $counter++;
            }
         }
         for ($i=0;$i<count($nominations);$i++){
             for ($j=$i+1; $j<count($nominations);$j++){
                 if ($count[$j]>$count[$i]){
                     $temp = $count[$j];
                     $count[$j]=$count[$i];
                     $count[$i]=$temp;
                     $temp = $nominations[$j];
                     $nominations[$j]=$nominations[$i];
                     $nominations[$i]=$temp;
                 }
             }
         }
     }
    $reply= new StdClass;
    $reply->nominees=$nominations;
    $reply->nominations = $count;
    return $reply;
}

function getNameOf($rollNo){
  require 'connect.php';
  require 'config.php';
  $query="SELECT * FROM `$rollnodetails` WHERE `rollNo`='$rollNo'";
  $result = $db->query($query) or die ('There was an error during Database Reading [' . $db->error . ']');
  $student = $result->fetch_assoc();
  $candidatename = $student['studentName'];
  return $candidatename;
}
?>
