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
if(!empty($_SESSION['user']) )
{
 echo "<!--User Funktionen wie z.B. Passwort ändern-->"."\n";
 echo "<h1>Home</h1>";
 echo "<div class='home'>";
 include "PasswortChange.html";
 echo "</div>";
}
else
{
// Einbinden des Login Moduls
include "login.html";
// Einbinden des Register Moduls
include "register.html";
}?> 