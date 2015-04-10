<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
if (!isAdmin($username, $password)){
    ?>
                    <script type="text/javascript">
                        function redirect()
                            {
                                window.location="index.php";
                            }
                        alert("You have to login to view this page");
                        setTimeout(redirect(), 1000);
                    </script>
<?php
}
