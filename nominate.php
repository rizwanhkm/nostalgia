<?php
require 'session-check.php';
require 'connect.php';
require 'config.php';
require 'functions.php';
$award=$_GET['award'];
$award2=strtolower($_GET['award']);
$award2=preg_replace( "/\s+/", "", $award2);
$_SESSION[ 'award2']=$award2;
$_SESSION[ 'award']=$award;
$query="SELECT * FROM `$admin` where `settings` ='voting' ";
    $result = $db->query($query) or die ('There was an error during Database Entry [' . $db->error . ']');
    $row = $result->fetch_assoc();

    if ($row['value']==1){
        header("Location:awardlistvoting.php");
    }
    if (isFinalYear($username)){
        header("Location:logout.php");
    }

?>
<html>

<head>
    <title>Nominations</title>
    <link rel="stylesheet" href="style1.css" />
    <script src="jquery1.11.2.js"></script>
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
    <?php include 'session-check.php'; require 'connect.php'; ?>

    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png">
            </li>
            <li class="heading" id="heading">Award Nomination </li>
            <li class="heading"> >
                <?php echo $award;?> </li>
        </ul>
        <ul class="right">
            <li><a href="logout.php">Logout</a>
            </li>
            <li>You are Logged in as
                <?php echo $_SESSION[ 'username']; ?> </li>
        </ul>
    </div>
    <section class="message">Select you Nominee</section>
    <div class="content">
        <script>
                var award;
            award = '<?php echo $_SESSION['award'];?>';
            <?php
            $awardIndex = findAwardIndex($_SESSION['award'], $awarddetails);
            $awardFor = $awarddetails[$awardIndex][1];
            echo "var awardFor='$awardFor';";
            ?>
        </script>
        <?php if (strlen($awardFor)==2){
        ?>
        <div id='rollno1' class='halfwidth'>
            <input type="text" class="text" id="rollnosearch1" placeholder="Start typing Roll Number or Name">
            <div id="searchResultsMsg1" class="searchResultsMsg"></div>
            <table id="searchResults1" class="searchResults"></table>
        </div>
        <div id='rollno2' class='halfwidth'>
            <input type="text" class="text" id="rollnosearch2" placeholder="Start typing Roll Number or Name">
            <div id="searchResultsMsg2" class="searchResultsMsg"></div>
            <table id="searchResults2" class="searchResults"></table>
        </div>
        <?php }else{ ?>
        <script src="search.js"></script>

        <input type="text" class="text" id="rollnosearch1" placeholder="Start typing Roll Number or Name">
        <div id="searchResultsMsg1" class="searchResultsMsg"></div>
        <table id="searchResults1" class="searchResults"></table>



        <?php } ?>

    </div>
    <footer>
        <div class="valign-wrapper">Developed by Delta 2015</div>
    </footer>

</body>

</html>