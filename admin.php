<?php
$adminusername="";
$adminpassword="";
if (isset($_POST['username'])){
    $adminusername =  $_POST['username'];
    $adminpassword = $_POST['password'];
    if(strcmp($adminusername,"")==0){
      echo $adminusername;
      echo $adminpassword;
      $adminusername=$_SESSION['username'];
      $adminpassword=$_SESSION['password'];
    }
}
include 'functions.php';
if (!isAdmin($adminusername, $adminpassword)){
?>
<html>

<head>
    <title>Admin Login | Nostalgia 2016 </title>
    <link rel="stylesheet" href="style1.css" />
    <script type="text/javascript">
    </script>
</head>

<body id='body'>
  <div class="container">
    <div class="nav">
        <form action="admin.php" method="post">
            <ul class="index">
                <li>
                    <input type="submit" class="submit" value="Login"> </li>
                <li>
                    <input type="password" placeholder="Password" name="password" class="text"> </li>
                <li>
                    <input type="text" placeholder="Admin Username" name="username" class="text">
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
    <div class="footer">
            <div class="valign-wrapper">© Nostalgia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
  </div>
</body>

</html>
<?php
}else {

    session_start();
     $_SESSION['username']=$adminusername;
     $_SESSION['password']=$adminpassword;
    header("Location:adminAwardList.php");
      }
?>
