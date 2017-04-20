<?php
require 'session-check.php';
require 'connect.php';
require 'config.php';
require 'functions.php';

$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==1){
                header("Location:awardlistvoting.php");
                    
    }
        $username = $_SESSION['username'];
    if (!isFinalYear($username)){
                header("Location:logout.php");
                    
    }

?>
<html>

<head>
    <title>Nominations | Nostalgia 2017</title>
    <link rel="stylesheet" href="style1.css" />
    <script src="jquery1.11.2.js"></script>
    <script src="fuse.min.js"></script>
    <script src="search.js"></script>

    <script>
    $(document).ready(function () {
        $("#heading").on("click", function () {
                            window.location = "awardlist.php";
                                        
        });
                
    });
        </script>
            </head>

<body id='body'>
  <div class="container">
    <?php include 'session-check.php'; require 'connect.php'; ?>

        <div class="nav">
                    <ul class="left">
                                <li><img src="./images/nostlogo.png">
                                            </li>
                                                        <li class="heading" id="heading">Award Nomination </li>
                                                                    <li class="heading">
                                                                                    
        </ul>
        <ul class="right">
            <li><a href="logout.php">Logout</a>
            </li>
            <li>You are Logged in as
                <?php echo $_SESSION[ 'username' ]; ?> </li>
        </ul>
    </div>
    <section class="message">
      
     <h1>NOMINATIONS CLOSED</h1><br>
    <section class="message"><a href="mynominations.php">Click here to view your submitted nominations</a></section>
      <span class="info">
        
      </span>

    </section>
    <div class="content">
        

    </div>
    <div class="footer">
        <div class="valign-wrapper">© Nostalgia 2017 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
</div>
</body>

</html>

