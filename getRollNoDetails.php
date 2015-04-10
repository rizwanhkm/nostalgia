<?php
require 'connect.php';
require 'config.php';
$query="SELECT * FROM `$rollnodetails`";
$result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
$reply=array();$counter = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reply[$counter]->rollno = $row['rollNo'];
        $reply[$counter]->name = $row['studentName'];
        $reply[$counter]->department = $row['Department'];
        $reply[$counter]->gender = $row['Gender'];
        $counter++;
    }
}
echo json_encode($reply);
