<?php
session_start();
if(!$_SESSION['grupp']){
    header('Location: '.'login.php');
}
?>