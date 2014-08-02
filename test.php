<?php
$json_a=json_decode(file_get_contents("config.json"),true);

echo json_a[1];
?>
