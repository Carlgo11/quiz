<?php if (file_exists(__DIR__ . '/config.php')) {
    $conf = include(__DIR__ . '/config.php');
} else {
    die;
}
  include(__DIR__ . '/MySQL.php');
  include(__DIR__ . '/Validate.php');
$con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or die(mysqli_error($con));
