<html>
<script>
    <?php session_start(); $_SESSION['award']?>
    var award;
    award = '<?php echo $_SESSION['award'];?>';
</script>
<head>
    <link rel="stylesheet" href="style1.css">
    <script src="jquery1.11.2.js"></script>
    <script src="search.js"></script>
</head>

<body>
    <input type="text" class="text" id="rollnosearch" placeholder="Start typing Roll Number">
    <div id="searchResultsMsg" class="searchResultsMsg"></div>
    <table id="searchResults" class="searchResults"></table>
</body>

</html>
