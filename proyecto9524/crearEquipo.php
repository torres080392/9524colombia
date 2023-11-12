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
    $usuario = $_POST['usuario'];
    $equipo = $_POST['equipo'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $fecha_compra = $_POST['fecha_compra'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

    // Llamar al procedimiento almacenado
    $sql = "EXEC crearEquipos @usuario = :usuario,@tipoEquipo = :tipoEquipo, @nombreEquipo = :nombreEquipo, @numeroEquipo = :numeroEquipo, @fechaCompra = :fechaCompra, @fechaInicio = :fechaInicio, @fechaFinal = :fechaFinal";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':tipoEquipo', $equipo);
    $stmt->bindParam(':nombreEquipo', $nombre);
    $stmt->bindParam(':numeroEquipo', $numero);
    $stmt->bindParam(':fechaCompra', $fecha_compra);
    $stmt->bindParam(':fechaInicio', $fecha_inicio);
    $stmt->bindParam(':fechaFinal', $fecha_final);
    $stmt->execute();

    if ($stmt) {
        // Redireccionar al mismo formulario si la consulta fue exitosa
        header('Location: equipos.php?exito=1');
        exit();
    } else {
        echo "Hubo un error al procesar la solicitud.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
