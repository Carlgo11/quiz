<?php

function send() {
  
    $name = $_SESSION['name'];
    $url = $conf['url'];
    $user = $conf['user'];
    $password = $conf['password'];
    $db = $conf['database'];
    $table = $conf['table'];
    $q = $conf['questions'];

    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to database"); 


    $right = 0;
    $w = array();
    for ($i = 1; $i <= $q; $i++) {
        $r = $_POST[$i];
        $w[] = "`q" . $i . "` = '" . $r . "'";
    }
    $e = implode(", ", $w);
    $query = mysql_query("UPDATE " . $table . " SET " . $e . " WHERE name='$name'");
}
