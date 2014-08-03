<?php include'session.php';

$grupp = $_SESSION['grupp'];
$table = $_SESSION['table'];
$db = $_SESSION['db'];
$user = $_SESSION['user'];
$url = $_SESSION['url'];
$db = "jon";
$connect = mysql_connect($url,$db , "6HmnPm66vGN8MawH") or die("Connection problem.");
mysql_select_db($db) or die("Couldn't connect to database");


$result = 0;
include 'resources/header.php';
echo '
    <body>
        <div class="container" style="margin-top: 80px">
        <form role="form" action="send.php" method="POST">
                ';
for ($i = 1; $i <= $_SESSION['q']; $i++) {
    echo '<div name="q' . $i . '" style="margin-top: 40px">
            <h2>Fråga ' . $i . ':</h2>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '1">1</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . 'x">x</label></div>
            <div class="checkbox"><label><input type="checkbox" name="' . $i . '2">2</label></div>
            </div>';
}
echo'
            <br><div class="alert alert-danger"><p>Dubbelkolla att du svarat på alla frågor innan du skickar.</p><p> Fler än ett svar på varje fråga gör svaret ogiltigt!</p></div>
            <button class="btn btn-primary btn-default" type="submit" style="margin-top: 10px">Skicka</button>
            
            
        </form>
        </div>
        
    </body>
</html>
';
?>
