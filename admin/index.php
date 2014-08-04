<?php

include'session.php';
$config = parse_ini_file("../config.ini");

$q = $config['questions'];

if (isset($_POST['subDoLoginAction'])) {
    post();
} else {
    setup($q);
}

function post() {
    $config = parse_ini_file("../config.ini");

    $url = $config['url'];
    $user = $config['user'];
    $password = $config['password'];
    $db = $config['database'];
    $answers = $config['answers'];
    $table = $config['table'];
    $q = $config['questions'];

    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to the database");
    $s = array();
    $c = array();
    for ($i = 0; $i <= $q; $i++) {
        $s[] = "`r" . $i . "` text";
        $c[] = "`q" . $i . "` text";
    }

    $sunq = implode(", ", $s);
    $cunq = implode(", ", $s);
    $aquery = "CREATE TABLE IF NOT EXISTS " . $answers . " (" . $sunq . ")";
    $bquery = "CREATE TABLE IF NOT EXISTS " . $table . " (" . "name text, result text, " . $cunq . ")";
    $querya = mysql_query($aquery);
    $queryb = mysql_query($bquery);



    $w = array();
    $r = array();
    for ($i = 1; $i <= $q; $i++) {

        $one;
        $x;
        $two;
        if (empty($_POST[$i . "1"])) {
            $one = 0;
        } else {
            $one = 1;
        }

        if (empty($_POST[$i . "x"])) {
            $x = 0;
        } else {
            $x = 1;
        }

        if (empty($_POST[$i . "2"])) {
            $two = 0;
        } else {
            $two = 1;
        }
        $w[] = "`r" . $i . "`";
        $r[] = "'" . $one . $x . $two . "'";
    }
    $e = implode(", ", $w);
    $y = implode(", ", $r);

    $cquery = "INSERT INTO `" . $answers . "` (" . $e . ") VALUES (" . $y . ")";
    $empty = mysql_query("TRUNCATE TABLE `answers`");
    $qyeryb = mysql_query($cquery);
    $result = 0;
    include '../resources/header.php';
    echo '<body>
        <div class="container" style="margin-top: 80px">
        <h2>Answers sent!</h2>
        <h3>The quiz is now ready to be used.<h3>';
    session_destroy();
}

function setup($q) {
    include '../lang.php';
    $result = 0;
    include '../resources/header.php';
    echo '<body>
        <div class="container" style="margin-top: 80px">
        <form role="form" action="" method="POST">
        <h2>Enter the correct answers</h2>';
    for ($i = 1; $i <= $q; $i++) {
        echo '<div name="q' . $i . '" style="margin-top: 40px">
            <div class="panel panel-default"><div class="panel-heading">
            <h2>Question ' . $i . ':</h2></div><div class="panel-body">
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '1">'.$Lang["1"].'</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . 'x">'.$Lang["x"].'</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '2">'.$Lang["2"].'</label></div>
            </div></div>';
    }
    echo'<br><button class="btn btn-primary btn-default" type="submit" name="subDoLoginAction" style="margin-top: 10px">'.$Lang["submit"].'</button>
        </form></div>
    </body>
</html>';
}
?>






