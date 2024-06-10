<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "agenda";

// Variable para almacenar el mensaje de estado de la modificación
$message = "";

// Verificar si se ha enviado el formulario de búsqueda
if(isset($_POST['submit'])) {
    // Establecer la conexión con la base de datos
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
            // Asignar los datos a variables individuales
            $nombre = $row['nombre'];
            $aPaterno = $row['aPaterno'];
            $aMaterno = $row['aMaterno'];
            $apodo = $row['apodo'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
            $cumpleanos = $row['cumpleanos'];
            $codigo_postal = $row['codigo_postal'];
            $hobbies = $row['hobbies'];
        } else {
            $message = "No se encontró ningún registro con ese ID.";
        }

        // Cerrar la conexión
        mysqli_close($connection);
    }
}

// Verificar si se ha enviado la solicitud de modificación
if(isset($_POST['modify'])) {
    // Establecer la conexión con la base de datos
    $connection = mysqli_connect($host, $user, $pass, $db);

    // Obtener los datos enviados por el formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['aPaterno'];
    $aMaterno = $_POST['aMaterno'];
    $apodo = $_POST['apodo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $cumpleanos = $_POST['cumpleanos'];
    $codigo_postal = $_POST['codigo_postal'];
    $hobbies = $_POST['hobbies'];

    // Actualizar el registro con los nuevos datos
    $query = "UPDATE amigos SET 
                nombre='$nombre', 
                aPaterno='$aPaterno', 
                aMaterno='$aMaterno', 
                apodo='$apodo', 
                direccion='$direccion', 
                telefono='$telefono', 
                cumpleanos='$cumpleanos', 
                codigo_postal='$codigo_postal', 
                hobbies='$hobbies' 
              WHERE id=$id";

    $result = mysqli_query($connection, $query);

    // Verificar si la actualización fue exitosa
    if($result) {
        $message = "El registro con ID $id ha sido actualizado correctamente.";
    } else {
        $message = "Error al intentar actualizar el registro.";
    }

    // Cerrar la conexión
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
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
    <h1>Modificar Registro</h1>
    <form method="post">
        <label>ID:</label>
        <input type="text" name="id" required><br>
        <button type="submit" name="submit">Buscar</button>
    </form>

    <?php if(isset($nombre)) { ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required><br>
        <label>Apellido Paterno:</label>
        <input type="text" name="aPaterno" value="<?php echo htmlspecialchars($aPaterno); ?>" required><br>
        <label>Apellido Materno:</label>
        <input type="text" name="aMaterno" value="<?php echo htmlspecialchars($aMaterno); ?>" required><br>
        <label>Apodo:</label>
        <input type="text" name="apodo" value="<?php echo htmlspecialchars($apodo); ?>" required><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo htmlspecialchars($direccion); ?>" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required><br>
        <label>Cumpleaños:</label>
        <input type="text" name="cumpleanos" value="<?php echo htmlspecialchars($cumpleanos); ?>" required><br>
        <label>Código Postal:</label>
        <input type="text" name="codigo_postal" value="<?php echo htmlspecialchars($codigo_postal); ?>" required><br>
        <label>Hobbies:</label>
        <input type="text" name="hobbies" value="<?php echo htmlspecialchars($hobbies); ?>" required><br>
        <button type="submit" name="modify">Modificar</button>
    </form>
    <?php } ?>

    <p><?php echo htmlspecialchars($message); ?></p>
    <a href="index.html">Inicio</a>
</body>
</html>

