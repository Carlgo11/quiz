<?php
include 'session.php';

$grupp = $_SESSION['grupp'];
$db = "midsommar";
 $connect = mysql_connect("localhost", "midsommar", "VDqR9R3ZyJb9UzFm") or die("Connection problem.");
    mysql_select_db($db) or die ("Couldn't connect to database");
    
    
$right = 0;   
for($i = 1; $i < $_SESSION['q']; $i++){

    $one;
    $x;
    $two;
    if(empty($_POST[$i."1"])){
        $one = 0;
    }else{
        $one = 1;
    }
    echo $one;
    
    if(empty($_POST[$i."x"])){
        $x = 0;
    }else{
        $x = 1;
    }
    echo $x;
    
    if(empty($_POST[$i."2"])){
        $two = 0;
    }else{
        $two = 1;
    }
    echo $two;

    $query = mysql_query("UPDATE ".$db." SET `r".$i."` = '".$one.$x.$two."' WHERE grupp='$grupp'");
}
mysql_query("UPDATE ".$db." SET `done` = '1' WHERE grupp='".$grupp."'");
header('Location: results.php');