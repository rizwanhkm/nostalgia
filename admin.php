<?php
$adminusername = $_POST['username'];
$adminpassword = $_POST['password'];
if(strcmp($username,"")==0){
    echo $username;
    echo $password;
    $adminusername=$_SESSION['username'];
    $adminpassword=$_SESSION['password'];
}
include 'functions.php';
if (!isAdmin($adminusername, $adminpassword)){
?>
<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <script type="text/javascript">
    </script>
</head>

<body id='body'>
    <div class="nav">
        <form action="admin.php" method="post">
            <ul class="index">
                <li>
                    <input type="submit" class="submit"> </li>
                <li>
                    <input type="password" placeholder="Password" name="password" class="text"> </li>
                <li>
                    <input type="text" placeholder="Roll Number" name="username" class="text">
                </li>

        </form>
        </ul>
    </div>
    <div class="content">
        <div class="valign-wrapper">
            <img class="logobig" src="images/nostlogo.png">
        </div>
    </div>
    </div>
    <footer>
        <div class="valign-wrapper">Developed by Delta 2015</div>
    </footer>
</body>

</html>
<?php
}else {

    session_start();
     $_SESSION['username']=$adminusername;
     $_SESSION['password']=$adminpassword;
    header("Location:adminpanel.php");



      }
?>