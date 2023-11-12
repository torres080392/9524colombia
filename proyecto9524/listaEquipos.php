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
    <title>Menú empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=3.0">

</head>
<body>
    <header>
        <div class="four columns">
            <img src="img/logo.PNG" id="logo">
         
        </div>
        <button id="navegarBoton">Atras</button>
        <!-- Script JavaScript para la navegación -->
        <script>
            // Obtén una referencia al botón
            var botonNavegar = document.getElementById("navegarBoton");

            // Agrega un controlador de eventos para el clic en el botón
            botonNavegar.addEventListener("click", function() {
                // Navega a la otra página
                window.location.href = "equipos.php"; // Reemplaza "otra_pagina.html" con la URL de la página a la que deseas navegar.
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
                <h2>Tabla de equipos</h2>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Id del usuario</th>
                        <th>Id del tipo de equipo</th>
                        <th>Nombre del equipo</th>
                        <th>Serial/Servitage </th>
                        <th>Fecha compra</th>
                        <th>Inicia garantia</th>
                        <th>Termina garantia</th>
                        
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
$idequipos = 1; // Reemplaza con el valor adecuado
$usuarios_id = 2; // Reemplaza con el valor adecuado
$tipo_equipo_id_equipo = 3; // Reemplaza con el valor adecuado
$nom_equipo = "nombre_del_equipo"; // Reemplaza con el valor adecuado
$num_equipo = "numero_de_equipo"; // Reemplaza con el valor adecuado
$fecha_compra = "2023-11-07 00:00:00.000"; // Reemplaza con el valor adecuado
$fecha_inicio_garan = "2023-11-07 00:00:00.000"; // Reemplaza con el valor adecuado
$fecha_final_garan = "2023-11-07 00:00:00.000"; // Reemplaza con el valor adecuado

$sql = "{CALL ObtenerEquipos(?, ?, ?, ?, ?, ?, ?, ?)}";

$params = array(
    array($idequipos, SQLSRV_PARAM_IN),
    array($usuarios_id, SQLSRV_PARAM_IN),
    array($tipo_equipo_id_equipo, SQLSRV_PARAM_IN),
    array($nom_equipo, SQLSRV_PARAM_IN),
    array($num_equipo, SQLSRV_PARAM_IN),
    array($fecha_compra, SQLSRV_PARAM_IN),
    array($fecha_inicio_garan, SQLSRV_PARAM_IN),
    array($fecha_final_garan, SQLSRV_PARAM_IN)
);

$result = sqlsrv_query($conn, $sql, $params);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    if (sqlsrv_has_rows($result)) {
        // Resto del código para recorrer y mostrar los datos en la tabla
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["idequipos"] . "</td>";
            echo "<td>" . $row["usuarios_id"] . "</td>";
            echo "<td>" . $row["tipo_equipo_id_equipo"] . "</td>";
            echo "<td>" . $row["nom_equipo"] . "</td>";
            echo "<td>" . $row["num_equipo"] . "</td>";
            echo "<td>". $row["fecha_compra"]->format("d-m-Y")."</td>";
            echo "<td>". $row["fecha_inicio_garan"]->format("d-m-Y")."</td>";
            echo "<td>".$row["fecha_final_garan"]->format("d-m-Y")."</td>";
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