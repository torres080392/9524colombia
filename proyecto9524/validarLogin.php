<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos (ajusta los detalles de conexión)
    $serverName = "carlosTorres";
    $connectionOptions = array(
        "Database" => "9524colombia",
        "Uid" => "sa",
        "PWD" => "1992"
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if (!$conn) {
        die("Error de conexión a la base de datos: " . sqlsrv_errors());
    }

    // Obtén los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userRole = "";  // Declaración de la variable de salida

    // Llama al procedimiento almacenado para verificar el inicio de sesión
     // Llama al procedimiento almacenado para verificar el inicio de sesión
     $tsql = "{call IniciarSesion(?, ?, ?)}";
     $params = array(
         array($username, SQLSRV_PARAM_IN),
         array($password, SQLSRV_PARAM_IN),
         array(&$userRole, SQLSRV_PARAM_OUT)
     );
 
     $stmt = sqlsrv_query($conn, $tsql, $params);
 
     if ($stmt === false) {
         die("Error al ejecutar el procedimiento almacenado: " . print_r(sqlsrv_errors(), true));
     }
 
     // Verifica el rol y redirige según el resultado
     if ($userRole === 'No válido') {
        header("Location: login_error.php");
   
     } elseif ($userRole === 'admin') {
         header("Location: Menu/Menu.php");
     } elseif ($userRole === 'usuarios') {
         header("Location: Menu.php");
     }
}
?>



