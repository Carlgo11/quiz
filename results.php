<!DOCTYPE html>
<html>
    <?php
    include 'resources/header.php';
    ?>
    <body>
        <div class="container" style="margin-top: 80px">

            <?php
            include 'session.php';

            $config = parse_ini_file("config.ini");

            $name = $_SESSION['name'];
            $url = $config['url'];
            $user = $config['user'];
            $password = $config['password'];
            $db = $config['database'];
            $table = $config['table'];
            $q = $config['questions'];
            $answers = $config['answers'];

            $connect = mysql_connect($url, $user, $password) or die(mysql_error());
            mysql_select_db($db) or die(mysql_error());


            $result = 0;

            $a = mysql_query("SELECT * FROM " . $table) or die(mysql_error());
            $ba = "SELECT * FROM " . $answers . " WHERE `name`='" . $name . "'";
            $bc = mysql_query($ba) or die(mysql_error());
            $ra = mysql_fetch_array($a);
            $rb = mysql_fetch_array($bc);
            for ($i = 1; $i <= $_SESSION['q']; $i++) {
                if ($ra['r' . $i] == $rb['q' . $i]) {
                    $result++;
                }
            }
            $o = $q;
            echo "<div class='panel panel-default'><div class='panel-heading'>Resultat för grupp <b>" . ucfirst($name) . "</b></div><div class='panel-body'>";
            echo "Ni hade " . $result . " rätt av " . $o;
            echo "</div>";

            mysql_query("UPDATE `" . $db . "` SET `result` = '" . $result . "' WHERE name='" . $name . "'");
            ?>
        </div>
    </body>
</html>
