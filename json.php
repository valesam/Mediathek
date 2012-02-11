<?php
echo "<pre>"."Definiertes Array";
$namen = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q");
print_r ($namen);

$json_name = json_encode($namen);
echo "Codierter es Array"."<pre>".$json_name;

$decoded_json_name = json_decode($json_name);
echo "decodierter es Array"."<pre>";
print_r ($decoded_json_name);
?>