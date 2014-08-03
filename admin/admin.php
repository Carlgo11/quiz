<?php
session_start();
if($_SESSION['admin'] != true){
    header('Location: '.'index.php');
}
?>