<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
// Definition der CreatCode Funktion
function CreateHash($laenge,$name,$email) 
{   
	// Mögliche Zeichen
	$zeichen = "1234567890abcdefghijklmnopqrstuvwxyz";   

	mt_srand( (double) microtime() * 1000000); 
	for ($i=1;$i<=$laenge;$i++){ 
		$outAsArray[] .= $zeichen[mt_rand(0,(strlen($zeichen)-1))];       
 	 }         
	$out = implode($outAsArray);
	$out = $out.$name.$email;
	$out = hash("SHA512",$out);
	return $out;  
 
}
include "funktionen/connect.php";
$Name = $_POST['user'];
$Email = $_POST['email'];
$sql = "Select Count(*) as OP From med_user Where Username = '$Name' And Email = '$Email'";
$res = mysql_query($sql);
$resultOfquery =  mysql_fetch_assoc($res);
if($resultOfquery['OP'] == 1)
{
	
	$linkHash = CreateHash(40,$Name,$Email);
	$link = "<a href='http://webserver/Mediathek/veri.php?hash=".$linkHash."'>Passwort ändern</a>";
	echo $link;
}
?>