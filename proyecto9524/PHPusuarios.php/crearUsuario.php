<?php
// Conexión a la base de datos SQL Server con PDO (ajusta los detalles de conexión)
$serverName = "carlostorres";
$database = "9524colombia";
$username = "sa";
$password = "1992";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Datos del formulario (suponiendo que vienen del POST)
    $id = $_POST['id'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $documento = $_POST['documento'];
   
   

    // Llamar al procedimiento almacenado
    $sql = "EXEC crearUsuarios          @tipo_usuario = :tipo_usuario,@nombre = :nombre,@telefono = :telefono, @correo= :correo, @direccion = :direccion, @documento = :documento";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tipo_usuario', $tipo_usuario);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':documento', $documento);
   
   
    $stmt->execute();

    if ($stmt) {
        // Redireccionar al mismo formulario si la consulta fue exitosa
        header('Location: usuarios.php?exito=1');
        exit();
    } else {
        echo "Hubo un error al procesar la solicitud.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
