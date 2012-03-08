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

<br>
<tr>
<td><input type ="radio" name="FSK" value="18">FSK ab 18</input></td>
<td><input type ="radio" name="FSK" value="16">FSK ab 16</input></td>
</tr>
<tr>
<td><input type ="radio" name="FSK" value="12">FSK ab 12</input></td>
<td><input type ="radio" name="FSK" value="6">FSK ab 6</input></td>
</tr>

<tr>
<td><h3>Bewertung:</h3></td>
<td><input type ="radio" name="Bewertung" value="5">*****</input></td>
<td><input type ="radio" name="Bewertung" value="4">****</input></td>
<td><input type ="radio" name="Bewertung" value="3">***</input></td>
<td><input type ="radio" name="Bewertung" value="2">**</input></td>
<td><input type ="radio" name="Bewertung" value="1">*</input></td>
</tr>

<tr>
<td>W&auml;hlen Sie eine Videodatei (mp4, flv, 3gp usw.) von Ihrem Rechner aus, um sie hochzuladen</td>
<td><input name="datei" type="file" size="50" maxlength="100000" accept="text/*"></td>
<td><input type="submit" value="Hochladen"></td>
</tr>
</form>
</table>


</p>
</form>