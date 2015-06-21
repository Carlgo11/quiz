<?php

include'session.php';

if (isset($_POST['subDoLoginAction'])) {
    send();
} else {
    answer();
}

function answer() {
    include 'lang.php';
    $config = parse_ini_file("config.ini");

    $name = $_SESSION['name'];
    $url = $config['url'];
    $user = $config['user'];
    $password = $config['password'];
    $db = $config['database'];
    $table = $config['table'];
    $q = $config['questions'];
    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to database");


    $result = 0;
    include 'resources/header.php';
    echo '
    <body>
        <div class="container">
        <form role="form" action="" method="POST">
                ';
    for ($i = 1; $i <= $q; $i++) {
        $top = "";
        if($i != 1){
            $top = 'style="margin-top: 40px"';
        }
        echo '<div name="q' . $i . '"'.$top.' >
            <div class="panel panel-default"><div class="panel-heading">
            <h2>' . $Lang["question"] . ' ' . $i . ':</h2></div><div class="panel-body">
            <div class="checkbox"><label><input type="radio"  name="' . $i . '" value="1" >'.$Lang["1"].'</label></div>
            <div class="checkbox"><label><input type="radio"  name="' . $i . '" value="x" >'.$Lang["x"].'</label></div>
            <div class="checkbox"><label><input type="radio" required="" name="' . $i . '" value="2" >'.$Lang["2"].'</label></div>
            </div></div>';
    }
    echo'
            <button class="btn btn-primary btn-default" type="submit" name="subDoLoginAction" style="margin-top: 30px">' . $Lang["submit"] . ' <span class="glyphicon glyphicon-saved"></start></button>
        </form>
        </div>
    </body>
</html>';
}

function send() {
    $config = parse_ini_file("config.ini");

    $name = $_SESSION['name'];
    $url = $config['url'];
    $user = $config['user'];
    $password = $config['password'];
    $db = $config['database'];
    $table = $config['table'];
    $q = $config['questions'];

    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to database"); 


    $right = 0;
    $w = array();
    for ($i = 1; $i <= $q; $i++) {

        $r;
        if (!empty($_POST[$i])) {
        if ($_POST[$i] == "1") {
            $r = "1";
        }

        if ($_POST[$i] == "x") {
            $r = "x";
        }

        if ($_POST[$i] == "2") {
            $r = "2";
        }
        }
        echo $r;
        $w[] = "`q" . $i . "` = '" . $r . "'";
    }
    $e = implode(", ", $w);

    $qu = "UPDATE " . $table . " SET " . $e . " WHERE name='$name'";
    
    echo " " . $qu;
    $query = mysql_query($qu);

    header('Location: results.php');
}

?>
