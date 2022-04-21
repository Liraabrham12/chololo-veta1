<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'factura';

$conn = @mysqli_connect($host,$user,$password,$db);

    if(!$conn){
        echo "Error de conexion";
    }
?>