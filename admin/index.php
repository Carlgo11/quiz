<!DOCTYPE html>
<html>
    <?php
    include '../resources/header.php';
    ?>
    <body>
        <div class="container" style="margin-top: 80px">
            <form class="form-signin" role="form" action="" method="POST">
                <h2 class="form-signin-heading">Enter admin password</h2>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" autofocus="" autocomplete="off" style="margin-top: 20px">
                <div align="right"><button class="btn btn-primary " type="submit" name="subDoLoginAction" style="margin-top: 5px" >Login</button></div>


                <?php
                session_start();
                if (isset($_POST['subDoLoginAction'])) {

                    doLogin();
                }

                function doLogin() {

                    $pass = $_POST["password"];
                    $config = parse_ini_file("../config.ini");


                    if ($pass == $config['adminpassword']) {
                        header('Location: setup.php');
                        $_SESSION['admin'] == true;
                        
                    } else {
                        error("Incorrect password. <br> (The password can be found in config.ini)");
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
