<?php
	session_start();
	include "connect.php";
	$oldPw = $_POST['oldPW'];
	$newPw = $_POST['newPW'];
	$newPwCheck = $_POST['newPWCheck'];
	$Username = $_POST['Username'];

	if(empty($Username))
	{
		echo "<p id='warningsPW'>Kein User</p>";
		session_destroy();
		exit;
	}

	$sql = "Select * From med_user Where Username = '$Username'";

	$resultOfQuery = mysql_query($sql);
	$resultAsAObject = mysql_fetch_object($resultOfQuery);
	$oldPwDbHash = $resultAsAObject->Passwort;
	$oldPwHash = hash('sha512',$oldPw);
	if($oldPwHash == $oldPwDbHash)
	{
		$newPwHash = hash('sha512',$newPw);
		$newPwCheckHash = hash('sha512',$newPwCheck);
		if($newPwHash == $newPwCheckHash)
		{
			mysql_query("Update med_user set Passwort = '$newPwCheckHash' Where Username = '$Username' ") or die("<p id='warningsPW'>Passwort konnte nicht geändert werden!</p>");
			echo "<p id='successPW'>Passwort wurde erfolgreich geändert!</p>";
		}
		else
		{
			echo "<p id='warningsPW'>Die neuen Passwörter stimmen nicht überein!</p>";
		}
	}
	else
	{
		echo "<p id='warningsPW'>Das alte Passwort ist nicht korrekt!</p>";
	}	
?>