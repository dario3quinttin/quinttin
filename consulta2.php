<?php
include('conexio2.php');
$datab = "agenda";

$db = mysqli_select_db($connection, $datab);


$consulta = "SELECT * FROM amigos";
$resul = mysqli_query($connection, $consulta);

if (!$resul) {
    echo "Error al ejecutar la consulta: " . mysqli_error($connection);
} else {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>";
    echo "<tr style='background-color: #2E8B57; color: #ffffff;'>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido Paterno</th>";
    echo "<th>Apellido Materno</th>";
    echo "<th>Apodo</th>";
    echo "<th>Dirección</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Cumpleaños</th>";
    echo "<th>Código Postal</th>";
    echo "<th>Hobbies</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while ($colum = mysqli_fetch_array($resul)) {
        echo "<tr style='background-color: #F5F5F5;'>";
        echo "<td>" . $colum['id'] . "</td>";
        echo "<td>" . $colum['nombre'] . "</td>";
        echo "<td>" . $colum['aPaterno'] . "</td>";
        echo "<td>" . $colum['aMaterno'] . "</td>";
        echo "<td>" . $colum['apodo'] . "</td>";
        echo "<td>" . $colum['direccion'] . "</td>";
        echo "<td>" . $colum['telefono'] . "</td>";
        echo "<td>" . $colum['cumpleanos'] . "</td>";
        echo "<td>" . $colum['codigo_postal'] . "</td>";
        echo "<td>" . $colum['hobbies'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

?>
<a href="index.html"ss>Inicio</a>

