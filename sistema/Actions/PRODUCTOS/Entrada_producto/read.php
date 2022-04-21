<?php 

include 'db.php';

if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];


$SQL_READ ="SELECT * FROM productos WHERE codigo LIKE '%".$buscar."%'";



$sql_query = mysqli_query($conn,$SQL_READ);

?>