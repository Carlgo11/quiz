<?php
include 'session.php';

$grupp = $_SESSION['grupp'];
$table = $_SESSION['table'];
$db = $_SESSION['db'];
 $connect = mysql_connect("localhost", "jon", "6HmnPm66vGN8MawH") or die("Connection problem.");
    mysql_select_db($db) or die ("Couldn't connect to database");
    
    
$right = 0;
$w = array();   
for($i = 1; $i <= $_SESSION['q']; $i++){

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
$w[] = "`q".$i."` = '".$one.$x.$two."'";
}
$e = implode(", ", $w);

    $qu = "UPDATE ".$table." SET ".$e." WHERE name='$grupp'";
echo " ".$qu;
    $query = mysql_query($qu);

header('Location: results.php');
