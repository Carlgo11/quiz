<?php
$url = "localhost";
$user = "jon";
$password = "6HmnPm66vGN8MawH";
$db = "jon";
$table = "q_table";
$q = 10;

    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to the database");
$s = array();
$s[] = "name text";
for ($i=0; $i<=$q; $i++) {
	$s[] = "`q".$i."` text";
}

$sunq = implode(", ", $s);
$cquery = "CREATE TABLE IF NOT EXISTS ".$table." (".$sunq.")";
//$s = substr_replace($s, "", -1);
// echo "createq: " . $cquery;
    $query = mysql_query($cquery);
?>
