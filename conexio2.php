<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "agenda";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    echo "No se ha podido conectar con el servidor: " . mysqli_connect_error();
} else {
    echo "Se ha conectado con el servidor";
}
?>
