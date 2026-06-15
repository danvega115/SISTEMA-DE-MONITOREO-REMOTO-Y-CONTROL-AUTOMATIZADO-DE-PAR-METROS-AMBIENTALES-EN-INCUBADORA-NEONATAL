<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "incubadora_neonatal"
);

if(!$conexion){
    die("Error de conexion");
}

?>