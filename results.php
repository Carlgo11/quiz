<!DOCTYPE html>
<html>
   <?php
include 'resources/header.php';
?>
    <body>
        <div class="container" style="margin-top: 80px">
        
<?php

include 'session.php';

$grupp = $_SESSION['grupp'];
$table2 = $_SESSION['table'];
$url = $_SESSION['url'];
$user = $_SESSION['user'];
$q = $_SESSION['q'];
$db = "jon";
$table = "answers";
 $connect = mysql_connect($url, $user, "6HmnPm66vGN8MawH") or die(mysql_error());
    mysql_select_db($db) or die (mysql_error());
    
    
$result=0;

$a = mysql_query("SELECT * FROM ".$table) or die(mysql_error());
$ba = "SELECT * FROM ".$table2." WHERE `name`='".$grupp."'";
     $bc = mysql_query($ba) or die(mysql_error());
     $ra = mysql_fetch_array($a);
     $rb = mysql_fetch_array($bc);
for($i = 1; $i <= $_SESSION['q']; $i++){
    if($ra['r'.$i] == $rb['q'.$i]){
        $result++;
        }
//echo $ba;
//echo "r$i:". $ra['r'.$i].", ";
//echo "q$i:". $rb['q'.$i].", ";
}
$o = $q;
echo "<div class='panel panel-default'><div class='panel-heading'>Resultat för grupp <b>".ucfirst($grupp)."</b></div><div class='panel-body'>";
if($result == 0){
 echo "looooool! ";    
}else if($result == 1){
    
}else if($result == 2){
    
}else if($result == 3){
    
}else if($result == 4){
    
}else if($result == 5){
    
}else if($result == 6){

}else if($result == 7){
 
}else if($result == 8){
    echo "Bravo! ";
}else if($result == 9){
    echo "Grattis! ";
}    
echo "Ni hade ".$result." rätt av ".$o;
echo "</div>";

mysql_query("UPDATE `".$db."` SET `result` = '".$result."' WHERE grupp='".$grupp."'");

?>
        </div>
    </body>
</html>
