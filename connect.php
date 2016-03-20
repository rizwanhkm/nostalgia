<?php
    $host="localhost";

    $user="nostalgia";
    $password="nostalgia";
    $dbname="nostalgia";

    $db = new mysqli($host, $user, $password, $dbname)
        or die ('Could not connect to the database server' . mysqli_connect_error());


?>
