<?php
session_start();
session_destroy();
HEADER("LOCATION: ../home.php")
?>