<?php
include('conexion.php');
$datab = "amigos";

$db = mysqli_select_db($connection, $datab);

if (!$db) {
    echo "Error al conectar a la base de datos";
} else {
    echo "BD seleccionada.";
}

$consulta = "SELECT * FROM nombres";
$resul = mysqli_query($connection, $consulta);

if (!$resul) {
    echo "Error al ejecutar la consulta";
} else {
    echo "<table>";
    echo "<tr>";
    echo "<th><h1>id</h1></th>";
    echo "<th><h1>nombre</h1></th>";
    echo "<th><h1>apellidoP</h1></th>";
    echo "</tr>";

    while ($colum = mysqli_fetch_array($resul)) {
        echo "<tr>";
        echo "<td>" . $colum['id'] . "</td>";
        echo "<td>" . $colum['nombre'] . "</td>";
        echo "<td>" . $colum['apellidoP'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
