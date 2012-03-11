<?php 
session_start();
//Abfrage ob gerade eine Fehlerkorektur eines Uploades durchgefürht wird
if ($_SESSION["fehlerImUpload"] == true)
{
	// Abfrage der Daten aus dem Vorherigen Formular
	$Filmtitel 		= $_SESSION['Name_cor']; // Daten aus dem Formular
	$Genre 			= $_SESSION['Genre_cor'];// Daten aus dem Vormular
	$Beschreibung 	= $_SESSION['Beschreibung_cor'];// Daten aus dem Formular
}
else
{
	$Filmtitel 		= "";
	$Genre 			= "";
	$Beschreibung 	= "";
}
?>

<div class="upload">
	<div class="upload Title">
		<lable>Neuen Film hochladen</lable>
	</div>
	<div class="upload Box">
	<ul>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<li><lable>Filmtitel:</lable><span style="padding-left:20px"><input type="Text" size="24" maxlength="50" name="Name" id="tags" value="<?php echo $Filmtitel; ?>" /></span></li>
		<li><lable>Genre:</lable><span style="padding-left:36px"><input type="Text" size="24" maxlength="50" name="Genre" value="<?php echo $Genre; ?>" /></span></li>
		<li><lable>Gr&ouml;&szlig;e des Films:</lable>
			<ul>
				<li><label>Width:</lable><span style="padding-left:18px"><input type="Text" size="5" maxlength="5" name="Width" /></span></li>
				<li><lable>Hight:</label><span style="padding-left:21px"><input type="Text" size="5" maxlength="5" name="Hight" /></span></li>
			</ul>
		<li><lable>Filmbeschreibung:</lable></li>
		<li><span style="padding-left:93px"><textarea name="Beschreibung" cols="50" rows="10" value="<?php echo $Beschreibung; ?>"></textarea></span></li>
		<li><lable>W&auml;hlen Sie eine Videodatei (mp4, flv, 3gp usw.) von Ihrem Rechner aus, um sie hochzuladen</lable><span style="padding-left:93px"><input name="datei" type="file" size="50" maxlength="100000" accept="text/*"></li>
		<li><input type="checkbox" name="update_box" value="update" /><lable>Updaten</lable></li>
		<li><input type="submit" value="Hochladen"><li>
		<li><div id="fehler"></div></li>
		<li></form></li>
	</ul>
</div>