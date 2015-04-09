<html>

<head>
    <title>Nominations</title>
    <link rel="stylesheet" href="style1.css" />
    <link rel="stylesheet" href="leaderboard.css" />
    <script src="jquery1.11.2.js"></script>
    <script>


$(document).ready(function () {
    $("#heading").on("click", function(){
        window.location ="awardlist.php";
    });
    $(".awards li").on("click", function(){
        var award = encodeURIComponent( $(this).text());
        window.location = "nominate.php?award="+award;
    });
});

    </script>
</head>

<body id='body'>
    <?php include 'session-check.php'; require 'connect.php'; ?>

    <div class="nav">
        <ul class="left">
            <li><img src="./images/nostlogo.png"></li>
            <li class="heading" id="heading"a>Award Nomination </li>
        </ul>
        <ul class="right">
            <li ><a href="logout.php">Logout</a></li>
            <li>You are Logged in as
                <?php echo $_SESSION['username']; ?> </li>
        </ul>
    </div>
<section class="mesasge">Select and Award to Nominate</section>
    <div class="content">
<ul class="awards left">
    <li><img src ="">Award 1</li>
    <li>Award 2</li>
    <li>Award 3</li>
    <li>Award 4</li>
    <li>Award 5</li>
    <li>Award 6</li>
    <li>Award 7</li>
    <li>Award 8</li>
    <li>Award 9</li>
    <li>Award 10</li>
    <li>Award 11</li>
    <li>Award 12</li>
    <li>Award 13</li>
    <li>Award 14</li>
    <li>Award 15</li>
    <li>Award 16</li>
    <li>Award 17</li>
    <li>Award 18</li>
    <li>Award 19</li>
    <li>Award 20</li>
    <li>Award 21</li>
    <li>Award 22</li>
    <li>Award 23</li>
    <li>Award 24</li>
    <li>Award 25</li>
    <li>Award 26</li>
    <li>Award 27</li>
    <li>Award 28</li>
    <li>Award 29</li>
    <li>Award 30</li>
    <li>Award 31</li>
    <li>Award 32</li>
    <li>Award 33</li>
    <li>Award 34</li>
    <li>Award 35</li>
    <li>Award 36</li>
    <li>Award 37</li>
    <li>Award 38</li>
    <li>Award 39</li>
    <li>Award 40</li>
        </ul>

    </div>
<footer>
        <div class="valign-wrapper">Developed by Delta 2015</div>
    </footer>

</body>

</html>
