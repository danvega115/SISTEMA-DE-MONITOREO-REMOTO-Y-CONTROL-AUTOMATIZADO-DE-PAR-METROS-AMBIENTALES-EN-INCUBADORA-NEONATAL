<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

include 'conexion.php';

// Obtener ultima alerta
$sql = "SELECT * FROM alertas ORDER BY fecha DESC LIMIT 1";

$resultado = mysqli_query($conexion, $sql);

$datos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard Incubadora</title>

    <meta http-equiv="refresh" content="5">

    <style>

        body{
            font-family: Arial;
            background-color: #f2f2f2;
            text-align: center;
        }

        .card{

            background: white;
            width: 300px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px gray;
        }

        table{

            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background: white;
        }

        table, th, td{

            border: 1px solid black;
            padding: 10px;
        }

        th{
            background: #ddd;
        }

    </style>

</head>

<body>

<h1>INCUBADORA NEONATAL</h1>

<h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>

<div class="card">

    <h2>MONITOREO EN TIEMPO REAL</h2>

    <h3>Temperatura</h3>

    <p>
        <?php echo $datos['temperatura']; ?> °C
    </p>

    <h3>Humedad</h3>

    <p>
        <?php echo $datos['humedad']; ?> %
    </p>

    <h3>Estado</h3>

    <p>
        <?php echo $datos['estado']; ?>
    </p>

</div>

<br>

<h2>REGISTRO DE ALERTAS</h2>

<table>

<tr>
    <th>ID</th>
    <th>Temperatura</th>
    <th>Humedad</th>
    <th>Estado</th>
    <th>Fecha</th>
</tr>

<?php

$sqlTabla = "SELECT * FROM alertas ORDER BY fecha DESC";

$resultadoTabla = mysqli_query($conexion, $sqlTabla);

while($fila = mysqli_fetch_assoc($resultadoTabla)){

?>

<tr>

    <td><?php echo $fila['id']; ?></td>

    <td><?php echo $fila['temperatura']; ?> °C</td>

    <td><?php echo $fila['humedad']; ?> %</td>

    <td><?php echo $fila['estado']; ?></td>

    <td><?php echo $fila['fecha']; ?></td>

</tr>

<?php } ?>

</table>

<br><br>

<a href="logout.php">
    Cerrar Sesion
</a>

</body>
</html>