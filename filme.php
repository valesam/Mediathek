
<?php
/** 
*Autor: Leon Bergmann & Florian Giller
*Datum: unbekannt 	
*Zweck: Such Menü für Filme
*/
// Einbinden der Verbindung zur Datenbank
include "funktionen/connect.php";
// Definition der SQl Statements
$sql = "Select Name from med_filme";
// Absenden des Statements | wenn das Statement fehl schlägt bekommt der User die Meldung
// Das keine Verbindung zur Mediathek besteht
$res = mysql_query($sql) /*or die ("<p id='warnings'>Keine Verbindung zur Mediathek</p>")*/;
// Solange die funktion mysql_fetch_assoc() werte in $filmData_Row schreibt wird folgender 
// Quellcode ausgeführt
while( $filmData_Row = mysql_fetch_assoc($res))
{
	// Schreibe aus dem Array $filmData_Row die Zeile Name in das Array FilmData
	$filmData[] = $filmData_Row['Name'];
}
// Achreibt das Array in ein JSON Object um 
$Hochladen = json_encode($hochladen);
if($FehlerMeldung != "")
{
	$fehlermeldung = json_encode($FehlerMeldung);
}
$json = json_encode($filmData);

/* Damit nicht bei jedem Request das Suchfenster eingeblendet wird prüfen wir ob
* die Variable AJAX null ist, wenn dies so ist wird das Suchfeld eingeblendet,weil
* der Request für diese Datei nicht von der Suche ausgelöst wurde, diese übermittel nähmlich
* den Wert Eins für die Variable $AJAX siehe oben.
*/

?>

	<script>
		$(function() {
			// Übernimmt die Daten des mit JSON codierten Array aus dem PHP CODE
			var json = '<?= $json ?>';
 			// Brücke zwischen PHP und JavaScript (clientseitig)
			var data = eval('(' + json + ')');
			
			var availableTags = data;
			$( "#tags" ).autocomplete({
					source: availableTags
				});
			});
	</script>
	<!-- Durch AJAX Funktion Abgelöst
	<script>
	function speichern(){
	 	var film = document.getElementById("tags").value;
	 	document.getElementById("id").value = film;
	 	document.Film.submit();
	}
	</script>
	-->
	
	<script type="text/javascript">
			$(function() {
				// Übernimmt die Daten des mit JSON codierten Array aus dem PHP CODE
				var json = '<?= $Hochladen  ?>';
 				if(json == 1){
					upload(<?= $fehlermeldung  ?>);
				}
			});
	</script>
	<script>
	function Suche(){
		// Name des Films aus der Autovervollständigung
		var film = document.getElementById("tags").value; 
	    // Neue Variable
		var params  = "ajax=1&film="+film;
		// Ziel Datei
		var url = "funktionen/suche.php";
		// Erstellen des Requests
		var http = new XMLHttpRequest();
		// Verbindung definieren
		http.open("POST", url, true);

		// Header Informationen setzen
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Content-length", params.length);
		http.setRequestHeader("Connection", "close");
		http.onreadystatechange = function() 
		{	//Call a function when the state changes.
			// Wenn die Rückgabe der Date dem readyState 4 und dem https status 200 entspricht wird 
			// die Rückgabe in die <div> Ausgabe geschrieben
			if(http.readyState == 4 && http.status == 200) 
			{
				document.getElementById("hochladen").innerHTML = "";
				var Data = http.responseText.split("#");
				document.getElementById("beschreibung").innerHTML = Data[0];
				document.getElementById("mediaplayer").innerHTML = Data[1];
	
			}
		}
		// Abschicken der des Requesrts
		http.send(params);
		
	};
	</script>
	<script>
		// Neue Javascript Funktion mit AJAX [http://de.wikipedia.org/wiki/Ajax_%28Programmierung%29]
	function upload(Fehler){
		// Name des Films aus der Autovervollständigung
		var url = "hochladen.php";
		var params  = "";
		// Erstellen des Requests
		var http = new XMLHttpRequest();
		// Verbindung definieren
		http.open("POST", url, true);

		// Header Informationen setzen
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Content-length", params.length);
		http.setRequestHeader("Connection", "close");
		http.onreadystatechange = function() 
		{	//Call a function when the state changes.
			// Wenn die Rückgabe der Date dem readyState 4 und dem https status 200 entspricht wird 
			// die Rückgabe in die <div> Ausgabe geschrieben
			if(http.readyState == 4 && http.status == 200) 
			{
				document.getElementById("beschreibung").innerHTML = "";
				document.getElementById("mediaplayer").innerHTML = "";
				document.getElementById("hochladen").innerHTML = http.responseText;
				if(typeof Fehler !='undefined')
				{
					document.getElementById("fehler").innerHTML = Fehler;
				}

			}
		}
		// Abschicken der des Requesrts
		http.send(params);
		
	};
	</script>
	<!-- Scuhfeld Definition -->
	<div class='Suche'>
 		<div class='Suche Title'>
 			<lable>Suche / Upload</lable>
 		</div>
		<div class="Suche Box">
			<input id="tags" name="film" onkeypress="{if (event.keyCode==13)Suche()}"/>
			<input type="submit" value="Absenden" onclick="Suche()">
			<input type="button" value="Hochladen?" onclick="upload()" onkeypress="{if (event.keyCode==13)upload()}">
		</div>
	</div>
	<div id="hochladen"></div>
	<div class="Beschreibung">
		<div id="beschreibung"></div>
		<div id="mediaplayer"></div>
	</div>
	

