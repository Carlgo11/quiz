<!DOCTYPE html>
<html>
    <?php
    include 'resources/header.php';
    include 'lang.php';
    echo'
    <body>
        <div class="container" style="margin-top: 80px">
            <form class="form-signin" role="form" action="" method="POST">
                <h2 class="form-signin-heading">' . $Lang["login-message"] . '</h2>
                <input type="username" name="name" class="form-control" placeholder="' . $Lang["name"] . '" required="" autofocus="" autocomplete="off" style="margin-top: 20px">
                <div align="right"><button class="btn btn-primary " type="submit" name="subDoLoginAction" style="margin-top: 5px" >' . $Lang["login"] . '</button></div>';

    if (isset($_POST['subDoLoginAction'])) {
        doLogin();
    }

    function doLogin() {
        $config = parse_ini_file("config.ini");
        session_start();

        $name = $_POST["name"];
        $name = strtolower($name);
        $enabled = true;

        $url = $config['url'];
        $user = $config['user'];
        $password = $config['password'];
        $db = $config['database'];
        $table = $config['table'];
        $q = 24;

        if ($enabled) {
            $connect = mysql_connect($url, $user, $password) or error("Connection problem.");
            mysql_select_db($db) or error("Couldn't connect to the database");


            $table_check = mysql_query("SHOW TABLES LIKE '" . $table . "'");
            $table_exists = mysql_num_rows($table_check) > 0;
            if (!$table_exists) {
                error('No answers created yet. Please go to <a href="admin/index.php">/admin/</a>');
            }

            $query = mysql_query("SELECT * FROM " . $table . " WHERE name='$name'");

            $numrow = mysql_num_rows($query);

            if ($numrow == 0) {

                $s = array();
                $w = array();
                for ($i = 1; $i <= $q; $i++) {
                    $s[] = "`q" . $i . "`";
                }
                for ($j = 0; $j < $i; $j++) {
                    $w[] = "NULL";
                }

                $sunq = implode(", ", $s);
                $wunq = implode(", ", $w);
                $qs = "INSERT INTO `" . $table . "` (`name`, `result`, " . $sunq . ") VALUES ('" . $name . "', NULL, '.$wunq.');";
                $query = mysql_query($qs);

                header('Location: index.php');
                $_SESSION['name'] = $name;
            } else {
                error("Det finns redan en grupp med det namnet!");
            }
        }
    }

    function error($msg) {
        echo '<br><div class="alert alert-danger">' . $msg . ' </div>';
        exit();
    }
    ?>
</form>
</div>
</body>
</html>




