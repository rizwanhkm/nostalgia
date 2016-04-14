<?php
session_start();
session_destroy();
?>
<html>

<head>
    <title>Nostalgia 2016</title>
    <link rel="stylesheet" href="style1.css" />
    <script type="text/javascript">
    </script>
</head>

<body id='body'>
  <div class="container">
    <div class="nav">
        <form action="login.php" method="post">
            <ul class="index">
                <li>
                    <input type="submit" class="submit" value="Login"> </li>
                <li>
                    <input type="password" placeholder="Webmail Password" name="password" class="text"> </li>
                <li>
                    <input type="text" placeholder="Roll Number" name="username" class="text">
                </li>
            </ul>
        </form>
    </div>
    <div class="content">
        <div class="valign-wrapper">
            <img class="logobig" src="images/nostlogo.png">
        </div>
    </div>
    </div>
    <div class="footer">
        <div class="valign-wrapper">© Nostalgia 2016 | MADE WITH <span style="color:#ef5350 ">  ❤</span> by <a href="https://www.facebook.com/delta.nit.trichy/">DELTA FORCE</a></div>
    </div>
</div>
</body>

</html>
