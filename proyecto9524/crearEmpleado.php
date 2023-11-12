<?php
// Conexión a la base de datos con PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "9524colombia";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Datos del formulario (suponiendo que vienen del POST)
    //$id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $areas = $_POST['areas'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
   
     // Llamar al procedimiento almacenado
     $stmt = $conn->prepare("CALL crearEmpleados( :nomEmpleado, :apellEmpleado, :nomArea, :docEmpleado, :telEmpleado, :corrEmpleado)");
     //$stmt->bindParam(':idEmpleados', $id);
     $stmt->bindParam(':nomEmpleado', $nombre);
     $stmt->bindParam(':apellEmpleado', $apellido);
     $stmt->bindParam(':nomArea', $areas);
     $stmt->bindParam(':docEmpleado', $documento);
     $stmt->bindParam(':telEmpleado', $telefono);
     $stmt->bindParam(':corrEmpleado', $email);
     $stmt->execute();
 

   
    if ($stmt) {
        // Redireccionar al mismo formulario si la consulta fue exitosa
        header('Location: empleados.php?exito=1   ');
        // Redireccionar al formulario con un mensaje de éxito
//header('Location:' . $_SERVER['HTTP_REFERER'] . '?exito=1');

        exit();
    } else {
        echo "Hubo un error al procesar la solicitud.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;