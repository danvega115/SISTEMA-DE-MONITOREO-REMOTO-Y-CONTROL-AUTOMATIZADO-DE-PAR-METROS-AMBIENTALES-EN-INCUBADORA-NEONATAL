<?php

include 'conexion.php';

$temperatura = $_GET['temperatura'];
$humedad = $_GET['humedad'];
$estado = $_GET['estado'];

$sql = "INSERT INTO alertas(temperatura, humedad, estado)
VALUES('$temperatura', '$humedad', '$estado')";

if(mysqli_query($conexion, $sql)){

    echo "Datos guardados";

}else{

    echo "Error";
}

?>