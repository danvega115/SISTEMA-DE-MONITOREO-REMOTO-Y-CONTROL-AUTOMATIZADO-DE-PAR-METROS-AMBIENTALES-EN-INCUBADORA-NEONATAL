<?php

include 'conexion.php';

$sql = "SELECT * FROM alertas ORDER BY fecha DESC";
$resultado = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Alertas</title>
</head>
<body>

<h1>REGISTRO DE ALERTAS</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Temperatura</th>
    <th>Humedad</th>
    <th>Estado</th>
    <th>Fecha</th>
</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['temperatura']; ?></td>
    <td><?php echo $fila['humedad']; ?></td>
    <td><?php echo $fila['estado']; ?></td>
    <td><?php echo $fila['fecha']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>