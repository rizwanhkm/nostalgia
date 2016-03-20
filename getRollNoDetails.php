<?php
require 'connect.php';
require 'config.php';
$query="SELECT * FROM `$rollnodetails`";
$result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
class Student {
}
$reply = array();
$counter = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $student = new Student;
        $student->rollno = $row['rollNo'];
        $student->name = $row['studentName'];
        $student->department = $row['Department'];
        $student->gender = $row['Gender'];
        $reply[$counter] = $student;
        $counter++;
    }
}
echo json_encode($reply);
