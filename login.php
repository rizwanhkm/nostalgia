
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$hostname = '{10.0.0.173:143/tls/novalidate-cert}INBOX';
//phpinfo();
$imap = imap_open($hostname, $username,$password);
if ($imap != NULL){
    echo "Logged In";
    session_start();
    $_SESSION['username']=$username;

}else{
    ?>
        <script type="text/javascript">
             function redirect()
             {
                 window.location = "index.php";
             }
             alert("Incorrect Roll Number Password Comibination");
             setTimeout(redirect(),1000);
        </script>
<?php
}
?>
