<?php
//Autor: Florian Giller auf Grundlage von Leon Bergmann
//Datum: 24.02.2012
//Anlegen eines neuen Benutzters
include "connect.php";
session_start();
if(!empty($_POST['username']) or !empty($_POST['password']) or !empty($_POST['password_check'])  )
{

	$Benutername = $_POST['username'];
	
	$newPasswort = $_POST['password'];
	$newPasswortCheck = $_POST['password_check'];
	$newPasswortHashed = hash('SHA512',$newPasswort);
	$newPasswortCheckHashed = hash('SHA512',$newPasswortCheck);
	$Email = $_POST['email'];
	if($newPasswortCheck != $newPasswortCheckHashed)
	{
		echo "<font color='#FF0000'><b>Die Passwörter Stimmen nicht überein!</b></font>";
		include "../main.php";
	}
	else
	{
		$rest	= mysql_query("SELECT * FROM med_user where Username = '$Username'");
		if(mysql_num_rows($rest) != 0)
		{
			echo "<font color='#FF0000'><b>Benutzername bereits vergeben! Bitte geben sie einen Alternativen Namen ein!</b></font>";
			include "../main.php";
		}
		else
		{
			$sql = "INSERT INTO med_user (Username,Passwort,Email) VALUES ('$Benutername','$newPasswortCheckHashed','$Email')";
			$rests = mysql_query($sql);
			echo "<font color='#00FF00'><b>Neuer Benutzer angelegt!</b></font>";
			include "../main.php";

		}
		
	}
}
else
{
	echo"<font color='#FF0000'><b>Es ist ein Fehler in der Eingabe aufgetreten!</b></font>";
	include "../main.php";
}
?> 