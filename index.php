<?php
session_start();
session_destroy();
?>
<html>

<head>
    <link rel="stylesheet" href="style1.css" />
    <script type="text/javascript">
    </script>
</head>

<body id='body'>
    <div class="nav">
        <form action="login.php" method="post">
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
        <div class="valign-wrapper">(C) Nostalia 2016 | MADE WITH ❤ BY <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </footer>
</body>

</html>
