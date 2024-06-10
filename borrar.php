<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #2e7d32;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #388e3c;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #388e3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2e7d32;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #388e3c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Eliminar Registro</h1>
    <form method="post">
        <label>ID:</label>
        <input type="text" name="id">
        <button type="submit" name="submit">Buscar</button>
    </form>

    <a href="index.html">Inicio</a>
</body>
</html>

<?php

$user = "root";
$pass = "";
$host = "localhost";
$db = "agenda";


if(isset($_POST['submit'])) {
    $connection = mysqli_connect($host, $user, $pass, $db);

    // Verificar si la conexión fue exitosa
    if (!$connection) {
        echo "No se ha podido conectar con el servidor: " . mysqli_connect_error();
    } else {
        // Obtener el ID enviado por el usuario
        $id = $_POST['id'];

        // Consultar los datos asociados al ID
        $query = "SELECT * FROM amigos WHERE id = $id";
        $result = mysqli_query($connection, $query);

        // Verificar si se encontró un registro con ese ID
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Mostrar los datos asociados al ID
            echo "<table border='1'>";
            echo "<tr>";
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
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['aPaterno'] . "</td>";
            echo "<td>" . $row['aMaterno'] . "</td>";
            echo "<td>" . $row['apodo'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td>" . $row['cumpleanos'] . "</td>";
            echo "<td>" . $row['codigo_postal'] . "</td>";
            echo "<td>" . $row['hobbies'] . "</td>";
            echo "</tr>";
            echo "</table>";

            // Mostrar el botón de eliminar
            echo "<form method='post'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<button type='submit' name='delete'>Eliminar</button>";
            echo "</form>";
        } else {
            echo "No se encontró ningún registro con ese ID.";
        }

        // Cerrar la conexión
        mysqli_close($connection);
    }
}

// Verificar si se ha enviado la solicitud de eliminar
if(isset($_POST['delete'])) {
    // Establecer la conexión con la base de datos
    $connection = mysqli_connect($host, $user, $pass, $db);

    // Obtener el ID enviado por el usuario
    $id = $_POST['id'];

    // Eliminar el registro con el ID especificado
    $query = "DELETE FROM amigos WHERE id = $id";
    $result = mysqli_query($connection, $query);

    // Verificar si la eliminación fue exitosa
    if($result) {
        echo "El registro con ID $id ha sido eliminado correctamente.";
    } else {
        echo "Error al intentar eliminar el registro.";
    }

    // Cerrar la conexión
    mysqli_close($connection);
}
?>

