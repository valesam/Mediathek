
<?php
/** 
*Autor: Leon Bergmann & Florian Giller
*Datum: unbekannt 	
*Zweck: Such Menü für Filme
*/
/**
	include "connect";
	$sql = "Select Titel from Filme";
	$res = mysql_query($sql) or die ("<p id='warnings'>Keine Verbindung zur Mediathek</p>");
	$filmData = mysql_fetch_array($res);
* Aus Testgründen wird hier ein vordefiniertes  Array verwendet später werden die Daten aus der DB geladen 
*/


$filmData = array("James Bond - Goldfinger","Resident Evil","Underworld","Balde","Lion","Back to the Future","Hot Fuzz", "Back to Karkand", "BF3", "I am Legend", "Terminator",
"WALL•E – Der Letzte räumt die Erde auf", "Vergessene Welt: Jurassic Park", "Twister", "Troja", "Transormers – Die Rache", "Transformers 3", "Transformers", "Toy Story 3", "Toy Story 2", "Titanic", "The Sixth Sense", "The Day After Tomorrow", "The Dark Knight", "The Da Vinci Code – Sakrileg", "Terminator 2 – Tag der Abrechnung", "Star Wars: Episode III – Die Rache der Sith", "Star Wars: Episode II – Angriff der Klonkrieger", "Star Wars: Episode I – Die dunkle Bedrohung", "Spider-Man 3", "Spider-Man 2", "Spider-Man", "Shrek der Dritte", "Shrek 2 – Der tollkühne Held kehrt zurück", "Sherlock Holmes: Spiel im Schatten", "Sherlock Holmes", "Rio", "Ratatouille", "Rapunzel – Neu verföhnt", "Pirates of the Caribbean – Fremde Gezeiten", "Pirates of the Caribbean – Fluch der Karibik 2", "Pirates of the Caribbean – Am Ende der Welt", "Oben", "New Moon – Bis(s) zur Mittagsstunde", "Nachts im Museum", "Mission: Impossible – Phantom Protokoll", "Mission: Impossible II", "Men in Black", "Meine Frau, ihre Schwiegereltern und ich", "Matrix Reloaded", "Mamma Mia!", "Madagascar 2", "Madagascar", "Kung Fu Panda 2", "Kung Fu Panda", "Krieg der Welten", "Krieg der Sterne/Star Wars: Episode IV – Eine neue Hoffnung", "ing Kong", "Kampf der Titanen", "Jurassic Park", "James Bond 007: Ein Quantum Trost", "James Bond 007: Casino Royale", "Iron Man 2", "Iron Man", "Indiana Jones und das Königreich des Kristallschädels", "Independence Day", "Inception", "Illuminati", "Ich – Einfach Unverbesserlich", "Ice Age 3: Die Dinosaurier sind los", "Ice Age 2: Jetzt taut’s", "I Am Legend", "Harry Potter und die Kammer des Schreckens", "Harry Potter und die Heiligtümer des Todes: Teil 2", "Harry Potter und die Heiligtümer des Todes: Teil 1", "Harry Potter und der Stein der Weisen", "Harry Potter und der Orden des Phönix", "Harry Potter und der Halbblutprinz", "Harry Potter und der Gefangene von Askaban", "Harry Potter und der Feuerkelch", "Hangover 2", "Hancock", "Ghost – Nachricht von Sam", "Für immer Shrek", "Forrest Gump", "Fluch der Karibik", "Findet Nemo", "Fast & Furious Five", "Eclipse – Bis(s) zum Abendrot", "E. T. – Der Außerirdische", "Drachenzähmen leicht gemacht", "Die Unglaublichen – The Incredibles", "Die Simpsons – Der Film", "Die Schlümpfe", "Die Passion Christi", "Die Monster AG", "Die Chroniken von Narnia: Der König von Narnia", "Der König der Löwen", "Der Herr der Ringe: Die zwei Türme", "Der Herr der Ringe: Die Rückkehr des Königs", "Der Herr der Ringe: Die Gefährten", "Der gestiefelte Kater", "Das Imperium schlägt zurück", "Cars 2", "Bruce Allmächtig", "Breaking Dawn – Bis(s) zum Ende der Nacht – Teil 1", "Avatar – Aufbruch nach Pandora", "Armageddon – Das jüngste Gericht", "Alice im Wunderland", "Aladdin", "2012");
$json = json_encode($filmData);

<<<<<<< HEAD
/* Damit nicht bei jedem Request das Suchfenster eingeblendet wird prüfen wir ob
* die Variable AJAX null ist, wenn dies so ist wird das Suchfeld eingeblendet,weil
* der Request für diese Datei nicht von der Suche ausgelöst wurde, diese übermittel nähmlich
* den Wert Eins für die Variable $AJAX siehe oben.
*/
if($AJAX == 0)
{
	include("funktionen/suche.html");
}
else
{	$film_pfad = "/mediathek/uploads/video.mp4";

	if (!empty($Film_Titel))
=======
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
	
	<script>
	// Neue Javascript Funktion mit AJAX [http://de.wikipedia.org/wiki/Ajax_%28Programmierung%29]
	function mi()
>>>>>>> Filme mit AJAX repariert
	{
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
				
				var data = http.responseText.split("#"); 
	
				jwplayer('mediaplayer').setup(
				{
					flashplayer: '/mediathek/player/player.swf',
					file: data[0],
					image: data[1]
				}
				);
				document.getElementById("beschreibung").innerHTML = data[2];
			}
		}
		// Abschicken der des Requesrts
		http.send(params);
		
	};
	</script>
	
	<!-- Scuhfeld Definition -->
	<div style="margin-top:120px;padding-left:20px;">
		<label for="tags">Tags: </label>
		<input id="tags" name="film"/>
		<input type="submit" value="Absenden" onclick="mi()">
	</div>
	<div style="padding-top:60px;">
		<div id="mediaplayer"></div>
		<div id="beschreibung"></div>
	</div>

