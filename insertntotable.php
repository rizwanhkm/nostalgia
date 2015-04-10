<?php
require 'connect.php';
$data=[];
$i=0;
$myfile = fopen("mech.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  $data[$i] =  fgets($myfile) ;
    $i++;
}

$len =  count($data);
$rollnodetails=array();
for ($i=0;$i<$len-1;$i+=2){
    if (($i+2)/2<10){
        $rollnodetails[$i/2]->rollno = substr($data[$i],2,9);
        $stringlen = strlen($data[$i]);
        $namelen= $stringlen-12-5;
        $rollnodetails[$i/2]->name = substr($data[$i],12,$namelen);
        $rollnodetails[$i/2]->gender = $data[$i][$stringlen-4];
    }else if (($i+2)/2<100) {
        $rollnodetails[$i/2]->rollno = substr($data[$i],3,9);
        $stringlen = strlen($data[$i]);
        $namelen= $stringlen-13-5;
        $rollnodetails[$i/2]->name = substr($data[$i],13,$namelen);
        $rollnodetails[$i/2]->gender = $data[$i][$stringlen-4];
    }else {
        $rollnodetails[$i/2]->rollno = substr($data[$i],4,9);
        $stringlen = strlen($data[$i]);
        $namelen= $stringlen-14-5;
        $rollnodetails[$i/2]->name = substr($data[$i],14,$namelen);
        $rollnodetails[$i/2]->gender = $data[$i][$stringlen-4];
    }
}
if (($i+2)/2<100){
    $rollnodetails[$i/2]->rollno = substr($data[$i],3,9);
    $stringlen = strlen($data[$i]);
    $namelen= $stringlen-13-4;
    $rollnodetails[$i/2]->name = substr($data[$i],13,$namelen);
    $rollnodetails[$i/2]->gender = $data[$i][$stringlen-3];
}else{
    $rollnodetails[$i/2]->rollno = substr($data[$i],4,9);
    $stringlen = strlen($data[$i]);
    $namelen= $stringlen-14-4;
    $rollnodetails[$i/2]->name = substr($data[$i],14,$namelen);
    $rollnodetails[$i/2]->gender = $data[$i][$stringlen-3];
}
fclose($myfile);
for($i=0;$i<count($rollnodetails);$i++){
    $rollno =$rollnodetails[$i]->rollno;
    $name = $rollnodetails[$i]->name;
    $gender =$rollnodetails[$i]->gender;
    echo $i.':'.$rollno.':'.$name.':'.$gender.'<br>';
            $query ="INSERT INTO `rollnodetails`
            (
            `rollNo`,
            `studentName`,
            `Department`,
            `Gender`
            )
            VALUES
            (
             '$rollno',
             '$name',
             'INSTRUMENTATION AND CONTROL ENGINEERING',
             '$gender'
             )";
        $db->query($query) or die ('There was an error Inserting Data into Databases [' . $db->error . ']');
}

?>
