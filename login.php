<?php

require 'connect.php';
require 'config.php';
require 'functions.php';
session_start();
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$hostname = '{10.0.0.173:143/tls/novalidate-cert}INBOX';
$imap = imap_open($hostname, $username,$password);
if ($imap != NULL){
//    UserName and Password Validated
//    Checking if it is Nomination Time or Voting Time

    $query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==0){
//        It's Nomination Time
//        Checking if the User if 4th year Student
        if (isFinalYear($username)){

//          Student Is a Fourth Year Student. Adding To Nomination Table if not already present.
            echo "Logged In";
            $query="SELECT * FROM `$nomination` where `rollno` ='$username' ";
            $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
            if ($result->num_rows==0){
                $query ="INSERT INTO `$nomination`(`rollno`) VALUES ( '$username' )";
                $db->query($query) or die ('There was an error Inserting Data into Databases [' . $db->error . ']');
            }

            $_SESSION['username']=$username;

//          Redirecting to AwardLists
            header("Location:awardlist.php");

        }else{
//           User is Not Final Year Student, Redirecting Back to Login Pages
             ?>
                    <script type="text/javascript">
                        function redirect(){
                                window.location="index.php";
                            }
                        alert("Voting Hasn't Started Yet");
                        setTimeout(redirect(), 1);
                    </script>
            <?php
        }
    } else {

//      It's Voting Time
//      Checking if the User is Already Present in the Table , if not adding to voting table

        echo "Logged In";
        $query="SELECT * FROM `$voting` where `rollno` ='$username' ";
        $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
        if ($result->num_rows==0){
            $query ="INSERT INTO `$voting` ( `rollno` ) VALUES ( '$username' )";
            $db->query($query) or die ('There was an error Inserting Data into Databases [' . $db->error . ']');
        }

        $_SESSION['username']=$username;

//      Redirecting To Voting Page
        header("Location:awardlistvoting.php");

    }

}else{
//      User Not Authenicated, Redirecitng to Login Page
    ?>
        <script type="text/javascript">
             function redirect(){
                 window.location = "index.php";
             }
             alert("Incorrect Roll Number Password Comibination");
             setTimeout(redirect(),1000);
        </script>
<?php
}
?>
