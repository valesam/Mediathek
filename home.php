<?php
session_start();
/**
* Autor: Leon Bergmann
* Datum: 22.2.2012 23:20
* Zweck : Seite die als aller erstes Aufgerufen wird wenn die Mediathek geöffnet wird. Hier Kann sich der User einloggen oder Regisliieren.
*/
// Einbinden des Menüs
include "menu.html";
/* Beim login wird die $_SESSION['user'] mit dem Usernamen gefüllt wenn dieser Variable leer ist wird das login &
*  regisliierungs modul geladen, wenn die Variable nicht leer ist werden verschiedene mögliche Aktionen für den 
*  User eingebledet
*/

if(!empty($_SESSION['user']))
{
 echo "<!--User Funktionen wie z.B. Passwort ändern-->"."\n";
 $Username = $_SESSION['user'];
 $json = json_encode($Username);
 echo "<h1>Willkommen auf der Homeseite, $Username</h1>";
 // Auruf der Formatierung für die HomeApps
 echo "<div class='home'>";
 // Einbinden der HomeApp Passwort wächseln
 include "PasswortChange.html";
 include "logout.html";
 echo "</div>";
}
else
{
// Einbinden des Login Moduls
include "login.html";
// Einbinden des Register Moduls
include "register.html";
}
echo "</div>
<style type='text/css'>
#pfeil{
background-image: url('style/arrow.png');
background-repeat: no-repeat;
background-position: center top;
margin-top: 25px;
z-index: 10;
width: 19px;
height: 9px;
margin-left: 7px;
}
</style>
";
?> 