<?php

include'admin.php';
$config = parse_ini_file("../config.ini");

$name = $_SESSION['name'];
$url = $config['url'];
$user = $config['user'];
$password = $config['password'];
$db = $config['database'];
$table = $config['table'];
$q = $config['questions'];
$connect = mysql_connect($url, $db, $password) or die("Connection problem.");
mysql_select_db($db) or die("Couldn't connect to database");

if (isset($_POST['subDoLoginAction'])) {

    post();
} else {
    setup();
}

function post() {
    $config = parse_ini_file("../config.ini");

    $url = $config['url'];
    $user = $config['user'];
    $password = $config['password'];
    $db = $config['database'];
    $table = $config['table'];
    $admin = $config['admin-password'];
    $q = 24;

    $connect = mysql_connect($url, $user, $password) or die("Connection problem.");
    mysql_select_db($db) or die("Couldn't connect to the database");
    $s = array();
    $s[] = "name text";
    for ($i = 0; $i <= $q; $i++) {
        $s[] = "`q" . $i . "` text";
    }

    $sunq = implode(", ", $s);
    $cquery = "CREATE TABLE IF NOT EXISTS " . $table . " (" . $sunq . ")";
    $query = mysql_query($cquery);
}

function setup() {
    $result = 0;
    include '../resources/header.php';
    echo '<body>
        <div class="container" style="margin-top: 80px">
        <form role="form" action="" method="POST">
                ';
    for ($i = 1; $i <= $q; $i++) {
        echo '<div name="q' . $i . '" style="margin-top: 40px">
        <h2>Enter the correct answers</h2>
            <h2>Fråga ' . $i . ':</h2>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '1">1</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . 'x">x</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '2">2</label></div>
            </div>';
    }
    echo'<br><button class="btn btn-primary btn-default" type="submit" style="margin-top: 10px">Submit</button>
        </form></div>
    </body>
</html>';
}
?>






