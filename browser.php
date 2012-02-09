<?php 
$work = $_SERVER['HTTP_USER_AGENT']; 
$browser = explode("(",$work);
$browser = $browser[0];

#$Os = explode(")",$work);
#$Os1 = $Os[0]; 

$Os = explode(" ",$Os1);
foreach($Os as $os)
{
echo $os."<br>";
}

echo $browser."<br>".$Os."<br>"; 

if (! isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$client_ip = $_SERVER['REMOTE_ADDR'];
}
else {
$client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

echo $client_ip."<br>";
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

?> 
