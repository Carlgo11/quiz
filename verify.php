<?php
session_start();

$grupp = $_POST["grupp"];
$grupp = strtolower($grupp);
$enabled = true;

$url = "localhost";
$user = "jon";
$password = "6HmnPm66vGN8MawH";
$db = "jon";
$table = "q_table";
$q = 24;

if ($enabled) {
    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to the database");


    $query = mysql_query("SELECT * FROM ".$table." WHERE name='$grupp'");

    $numrow = mysql_num_rows($query);

    if ($numrow == 0) {

$s = array();
for ($i=1; $i<=$q; $i++) {
        $s[] = "`q".$i."`";
}

$sunq = implode(", ", $s);
//echo "$sunq: ". $sunq;
$qs = "INSERT INTO `q_table` (`name`, ".$sunq.") VALUES ('".$grupp."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
echo $qs;
    $query = mysql_query($qs);

            header('Location: index.php');
            $_SESSION['grupp'] = $grupp;
            $_SESSION['q'] = $q;
            $_SESSION['url'] = $url;
            $_SESSION['user'] = $user;
	    $_SESSION['db'] = $db;
	    $_SESSION['table'] = $table;
}else{
include 'login.php';
    echo '<br><div class="alert alert-danger">Det finns redan en grupp med det namnet! </div>';
}
}
?>
