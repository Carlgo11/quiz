<!DOCTYPE html>
<html>
    <?php
    include 'resources/header.php';
    ?>
    <body>
        <div class="container" style="margin-top: 80px">
            <form class="form-signin" role="form" action="" method="POST">
                <h2 class="form-signin-heading">Skriv in din grupp</h2>
                <input type="username" name="name" class="form-control" placeholder="Name" required="" autofocus="" autocomplete="off" style="margin-top: 20px">
                <div align="right"><button class="btn btn-primary " type="submit" name="subDoLoginAction" style="margin-top: 5px" >Logga in</button></div>

                <?php
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
                            $qs = "INSERT INTO `".$table."` (`name`, `result`, " . $sunq . ") VALUES ('" . $name . "', NULL, '.$wunq.');";
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




