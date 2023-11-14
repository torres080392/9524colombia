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
    //$id = $_POST['id'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $usuario = $_POST['usuario'];
    $equipo = $_POST['equipo'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $fecha_compra = $_POST['fecha_compra'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $imei1 = $_POST['imei1'];
    $imei2 = $_POST['imei2'];
    $estado_equipo = $_POST['estado_equipo'];

    // Llamar al procedimiento almacenado
    $sql = "EXEC crearEquipos          @tipo_usuario = :tipo_usuario,@usuario = :usuario,@tipoEquipo = :tipoEquipo, @nombreEquipo
                                       = :nombreEquipo, @numeroEquipo = :numeroEquipo, @fechaCompra
                                       = :fechaCompra, @fechaInicio = :fechaInicio, @fechaFinal = :fechaFinal,@imei1 = :imei1,@imei2 = :imei2,@estado_equipo = :estado_equipo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tipo_usuario', $tipo_usuario);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':tipoEquipo', $equipo);
    $stmt->bindParam(':nombreEquipo', $nombre);
    $stmt->bindParam(':numeroEquipo', $numero);
    $stmt->bindParam(':fechaCompra', $fecha_compra);
    $stmt->bindParam(':fechaInicio', $fecha_inicio);
    $stmt->bindParam(':fechaFinal', $fecha_final);
    $stmt->bindParam(':imei1', $imei1);
    $stmt->bindParam(':imei2', $imei2);
    $stmt->bindParam(':estado_equipo', $estado_equipo);
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
