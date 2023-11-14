<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  left: 40px;
}

header {
  padding: 100px;
  margin-left: auto;
  background-color: orange;
  color: black;
  padding: 30px;
}
        table {
            width: 90%;
            /* Ancho total de la tabla */
            border-collapse: collapse;
            /* Borde de celda colapsado */
            margin-bottom: 20px;
            /* Espacio al final de la tabla */
            margin-left:30px;
        }
        h2{
            margin-left:30px;
        }

        /* Estilos para las celdas de la tabla */
        th,
        td {
            border: 1px solid #ccc;
            /* Borde de celda */
            padding: 8px;
            /* Espaciado interno de celda */
            text-align: left;
            /* Alineación del texto */
        }

        /* Estilos para la fila de encabezados (th) */
        th {
            background-color: #f2f2f2;
            /* Color de fondo de los encabezados */
        }

        /* Estilos alternados para filas impares */
        tr:nth-child(odd) {
            background-color: #e8e8e8;
            /* Color de fondo para filas impares */
        }

        .formulario input[type="text"],
        .formulario input[type="date"],
        .formulario input[type="select"] {
            width: calc(20% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #equipo {
            width: calc(20% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        #usuario {
            width: calc(20% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }


        input[type="submit"] {
            padding: 10px;

            background-color: green;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;

            /* Cambia el color del texto a blanco */
        }

        #navegarBoton {

            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 80%;
            /* Cambia el color del texto a blanco */
        }

        
    </style>
    <meta charset="UTF-8">
    <title>Menú usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=3.0">

</head>
<body>
    <header>
        <div class="four columns">
            <img src="logo.PNG" id="logo">
         
        </div>
        <button id="navegarBoton">Atras</button>
        <!-- Script JavaScript para la navegación -->
        <script>
            // Obtén una referencia al botón
            var botonNavegar = document.getElementById("navegarBoton");

            // Agrega un controlador de eventos para el clic en el botón
            botonNavegar.addEventListener("click", function() {
                // Navega a la otra página
                window.location.href = "usuarios.php"; // Reemplaza "otra_pagina.html" con la URL de la página a la que deseas navegar.
            });
        </script>

        <div id="mensaje-exito" style="display: none; color: green;">Operación exitosa</div>

        <script>
            // Mostrar el mensaje de éxito si la URL tiene el parámetro exito=1
            if (window.location.search.includes('exito=1')) {
                document.getElementById('mensaje-exito').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('mensaje-exito').style.display = 'none';
                }, 3000); // Ocultar el mensaje después de 2 segundos (2000 ms)
            }
        </script>
 

    </header>
    <main>
       
        <div id="formulario2" class="formulario hidden">
            <form action="" method="post">
                <h2>Tabla de usuarios</h2>

                <table>
                    <tr>
                        <th>Id de usuario</th>
                        <th>Id tipo usuario</th>
                        <th>Nombre usuario</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion </th>
                        <th>Documento o NIT </th>
                        
                    </tr>
                    <?php
// Establecer la conexión a la base de datos de SQL Server
$serverName = "carlosTorres"; // Reemplaza con el nombre de tu servidor SQL Server
$connectionOptions = array(
    "Database" => "9524colombia", // Reemplaza con el nombre de tu base de datos
    "Uid" => "sa", // Reemplaza con tu nombre de usuario
    "PWD" => "1992" // Reemplaza con tu contraseña
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Llamar al procedimiento almacenado "ObtenerEquipos" con parámetros
$id_usuario = 1;
$tipo_usuario_idtipo_usuario = 2; // Reemplaza con el valor adecuado
$nom_usuario = "nombre usuario"; // Reemplaza con el valor adecuado
$corr_usuario= "correo usuario"; // Reemplaza con el valor adecuado
$tel_usuario = "nombre_del_equipo"; // Reemplaza con el valor adecuado
$dir_usuario = "numero_de_equipo"; // Reemplaza con el valor adecuado
$doc_usuario = "socumento_de_equipo"; // Reemplaza con el valor adecuado



$sql = "{CALL ObtenerUsuario(?, ?, ?, ?, ?, ?,?)}";

$params = array(
    array($id_usuario, SQLSRV_PARAM_IN),
    array($tipo_usuario_idtipo_usuario, SQLSRV_PARAM_IN),
    array($nom_usuario, SQLSRV_PARAM_IN),
    array($corr_usuario, SQLSRV_PARAM_IN),
    array($tel_usuario, SQLSRV_PARAM_IN),
    array($dir_usuario, SQLSRV_PARAM_IN),
    array($doc_usuario, SQLSRV_PARAM_IN)
   
);

$result = sqlsrv_query($conn, $sql, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if (sqlsrv_has_rows($result)) {
        // Resto del código para recorrer y mostrar los datos en la tabla
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>";
            echo "<td>" . $row["tipo_usuario_idtipo_usuario"] . "</td>";
            echo "<td>" . $row["nom_usuario"] . "</td>";
            echo "<td>" . $row["corr_usuario"] . "</td>";
            echo "<td>" . $row["tel_usuario"] . "</td>";
            echo "<td>" . $row["dir_usuario"] . "</td>";
            echo "<td>" . $row["doc_usuario"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron elementos.";
    }
}

sqlsrv_close($conn);
?>

                    
                </table>
            </form>
        </div>
        
    </main>


</body>

</html>