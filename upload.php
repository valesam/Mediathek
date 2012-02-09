<?php
$dateityp = $_FILES['datei']['tmp_name'];

 

   if($_FILES['datei']['size'] <  102400)
      {
      move_uploaded_file($_FILES['datei']['tmp_name'], "upload/".$_FILES['datei']['name']);
      echo "Das Bild wurde Erfolgreich nach upload/".$_FILES['datei']['name']." hochgeladen";
      }

   else
      {
         echo "Die Datei darf nicht grφίer als 100 kb sein ";
      }
?>