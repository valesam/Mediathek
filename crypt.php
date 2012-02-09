<?php
$password = crypt('mypassword','$2a$10$usesomesillystringforsalt$');
echo $password;
?>