<?php
// Paso 1: Conectar a la base de datos
$host = 'localhost'; // Nombre del servidor de la base de datos
$usuario = 'root'; // Nombre de usuario de la base de datos
$contrasena = ''; // Contraseña de la base de datos
$base_de_datos = '9524colombia'; // Nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Paso 2: Recopilar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    // Puedes agregar más campos según tus necesidades
}

// Paso 3: Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (usuario,password) VALUES ('$usuario', '$password')";

if ($conexion->query($sql) === TRUE) {
    header("Location:Crearusuario.php");
    //$mensaje = "Datos guardados exitosamente";
} else {
    echo "Error al guardar datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
