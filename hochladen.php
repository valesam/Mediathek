<h1>Neuen Film hochladen</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
<table border="0" cellpadding="3" cellspacing="0">
<form action="register.php" method="post">
Filmtitel:
<br>
<input type="Text" size="24" maxlength="50" name="Name"></input>
<br>
Genre:
<br>
<input type="Text" size="24" maxlength="50" name="Genre"></input>
<br>
Filename:
<br>
<input type="Text" size="24" maxlength="50" name="file_name"></input>
<br>
Filmbeschreibung:
<br>
<textarea name="Beschreibung" cols="50" rows="10"></textarea>
<tr>
<td>W&auml;hlen Sie eine Videodatei (mp4, flv, 3gp usw.) von Ihrem Rechner aus, um sie hochzuladen</td>
<td><input name="datei" type="file" size="50" maxlength="100000" accept="text/*"></td>
<td><input type="submit" value="Hochladen"></td>
</tr>
</form>
</table>


</p>
</form>