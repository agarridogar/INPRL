<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "parteaccidente";
$conectar=mysqli_connect($host, $user, $pw, $db);
if(!$conectar){
    echo "No se pudo conectar a la db";
}else{
    $select=mysqli_select_db($db);
}
?>
