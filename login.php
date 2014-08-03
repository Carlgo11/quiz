<!DOCTYPE html>
<html>
    <?php 
include 'resources/header.php';
?>
    <body>
        <div class="container" style="margin-top: 80px">
            <form class="form-signin" role="form" action="verify.php" method="POST">
                <h2 class="form-signin-heading">Skriv in din grupp</h2>
                <input type="username" name="grupp" class="form-control" placeholder="Grupp" required="" autofocus="" autocomplete="off" style="margin-top: 20px">
                <div align="right"><button class="btn btn-primary " type="submit" name="subDoLoginAction" style="margin-top: 5px" >Logga in</button></div>
           
        
        
 

<?php

if (isset($_POST['subDoLoginAction'])) {

	doLogin();
}


function doLogin() {


}




