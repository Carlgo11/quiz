<!DOCTYPE html>
<html>
    <?php
    include 'resources/header.php';
    ?>
    <body>
        <div class="container" style="margin-top: 80px">

            <?php
            include 'session.php';
            include 'lang.php';

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

            $a = mysql_query("SELECT * FROM " . $answers) or die(mysql_error());
            $ba = "SELECT * FROM " . $table . " WHERE `name`='" . $name . "'";
            $bc = mysql_query($ba) or die(mysql_error());
            $ra = mysql_fetch_array($a);
            $rb = mysql_fetch_array($bc);
            for ($i = 1; $i <= $q; $i++) {
                if ($ra['r' . $i] == $rb['q' . $i]) {
                    $result++;
                }
            }
            $o = $q;
            echo "<div class='panel panel-default'><div class='panel-heading'>".$Lang['results1']." <b>" . ucfirst($name) . "</b></div><div class='panel-body'>";
            echo $Lang['results2'] . $result . $Lang['results3'] . $o .".";
            echo "</div>";

            mysql_query("UPDATE `" . $table . "` SET `result` = '" . $result . "' WHERE name='" . $name . "'");
            ?>
        </div>
    </body>
</html>
