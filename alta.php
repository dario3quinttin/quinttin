<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "agenda";

// Variable para almacenar el mensaje de estado de la inserción
$message = "";

// Verificar si se ha enviado el formulario
if(isset($_POST['submit'])) {
    // Establecer la conexión con la base de datos
    $connection = mysqli_connect($host, $user, $pass, $db);

    // Verificar si la conexión fue exitosa
    if (!$connection) {
        $message = "No se ha podido conectar con el servidor: " . mysqli_connect_error();
    } else {
        // Obtener los datos enviados por el formulario
        $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
        $aPaterno = mysqli_real_escape_string($connection, $_POST['aPaterno']);
        $aMaterno = mysqli_real_escape_string($connection, $_POST['aMaterno']);
        $apodo = mysqli_real_escape_string($connection, $_POST['apodo']);
        $direccion = mysqli_real_escape_string($connection, $_POST['direccion']);
        $telefono = mysqli_real_escape_string($connection, $_POST['telefono']);
        $cumpleanos = mysqli_real_escape_string($connection, $_POST['cumpleanos']);
        $codigo_postal = mysqli_real_escape_string($connection, $_POST['codigo_postal']);
        $hobbies = mysqli_real_escape_string($connection, $_POST['hobbies']);

        // Obtener el máximo ID actual y calcular el nuevo ID
        $result = mysqli_query($connection, "SELECT MAX(id) AS max_id FROM amigos");
        $row = mysqli_fetch_assoc($result);
        $new_id = $row['max_id'] + 1;

        // Insertar el nuevo registro en la base de datos
        $query = "INSERT INTO amigos (id, nombre, aPaterno, aMaterno, apodo, direccion, telefono, cumpleanos, codigo_postal, hobbies) VALUES ('$new_id', '$nombre', '$aPaterno', '$aMaterno', '$apodo', '$direccion', '$telefono', '$cumpleanos', '$codigo_postal', '$hobbies')";

        $result = mysqli_query($connection, $query);

        // Verificar si la inserción fue exitosa
        if($result) {
            $message = "Nuevo registro agregado correctamente.";
        } else {
            $message = "Error al intentar agregar el registro: " . mysqli_error($connection);
        }

        // Cerrar la conexión
        mysqli_close($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Registro</title>
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
        input[type="text"],
        input[type="date"] {
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
        p {
            color: #388e3c;
            text-align: center;
            margin-top: 10px;
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
    <h1>Agregar Nuevo Registro</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Apellido Paterno:</label>
        <input type="text" name="aPaterno" required><br>
        <label>Apellido Materno:</label>
        <input type="text" name="aMaterno" required><br>
        <label>Apodo:</label>
        <input type="text" name="apodo" required><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <label>Cumpleaños:</label>
        <input type="date" name="cumpleanos" required><br>
        <label>Código Postal:</label>
        <input type="text" name="codigo_postal" required><br>
        <label>Hobbies:</label>
        <input type="text" name="hobbies" required><br>
        <button type="submit" name="submit">Agregar</button>
    </form>

    <?php if($message) { echo "<p>$message</p>"; } ?>
    <br>
    <a href="index.html">Inicio</a>
</body>
</html>

