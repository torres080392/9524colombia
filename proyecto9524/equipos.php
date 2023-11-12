<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            /* Ancho total de la tabla */
            border-collapse: collapse;
            /* Borde de celda colapsado */
            margin-bottom: 20px;
            /* Espacio al final de la tabla */
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
        #navegarBotonLista {

padding: 10px;
background-color: green;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 20px;
margin-left: 3%;
/* Cambia el color del texto a blanco */
}
    </style>
    <meta charset="UTF-8">
    <title>Menú equipos</title>
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <link rel="stylesheet" href="css/menuEquipos.css">

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
                window.location.href = "Menu.php"; // Reemplaza "otra_pagina.html" con la URL de la página a la que deseas navegar.
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
        <nav>
            <ul>
                <li><a href="#" data-form="formulario1">Nuevo tipo de equipo</a></li>
                <li><a href="#" data-form="formulario2">Listado de equipos</a></li>
                <li><a href="#" data-form="formulario3">Crear un equipo en el sistema</a></li>
                <li><a href="#" data-form="formulario4">Buscar equipo</a></li>

            </ul>
        </nav>

    </header>
    <main>
        <div id="formulario1" class="formulario hidden">
            <h2>Crear tipo de quipo</h2>
            <form action="crearTipoEquipo.php" method="post">
                <label for="equipo">Tipo de equipo:</label>
                <input type="text" id="equipo" name="equipo" require>
                <input type="submit" value="Enviar">
                <!-- Campos del formulario 1 -->
            </form>

        </div>
        <div id="formulario2" class="formulario hidden">
            <form action="listaEquipos.php" method="post">
            <button id="navegarBotonLista">Oprimir para ver el listado de equipos</button>
        <!-- Script JavaScript para la navegación -->
        <script>
            // Obtén una referencia al botón
            var botonNavegar = document.getElementById("navegarBoton");

            // Agrega un controlador de eventos para el clic en el botón
            botonNavegar.addEventListener("click", function() {
                // Navega a la otra página
                window.location.href = "Menu.php"; // Reemplaza "otra_pagina.html" con la URL de la página a la que deseas navegar.
            });
        </script>

            </form>
        </div>


        <div id="formulario3" class="formulario hidden">
            <h2>Crear un nuevo equipo</h2>
            <form action="crearEquipo.php" method="post">
            <label for="usuario">Selecciones usuario :</label>
                <select name="usuario" id="usuario">
                <?php
// Conexión a la base de datos SQL Server (ajusta los detalles de conexión)
$serverName = "carlosTorres";
$connectionOptions = array(
    "Database" => "9524colombia",
    "Uid" => "sa",
    "PWD" => "1992"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Consulta la base de datos para obtener los productos
$sql = "SELECT id, username FROM usuarios";
$query = sqlsrv_query($conn, $sql);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($query)) {
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
    }
} else {
    echo "0 resultados";
}

// Cierra la conexión a SQL Server
sqlsrv_close($conn);
?>

              
 

                </select>

                <label for="equipo">Selecciones el equipo:</label>
                <select name="equipo" id="equipo">
                <?php
// Conexión a la base de datos SQL Server (ajusta los detalles de conexión)
$serverName = "carlosTorres";
$connectionOptions = array(
    "Database" => "9524colombia",
    "Uid" => "sa",
    "PWD" => "1992"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Consulta la base de datos para obtener los productos
$sql = "SELECT id_equipo, tipo_equipo FROM tipo_equipo";
$query = sqlsrv_query($conn, $sql);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($query)) {
    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
        echo "<option value='" . $row['id_equipo'] . "'>" . $row['tipo_equipo'] . "</option>";
    }
} else {
    echo "0 resultados";
}

// Cierra la conexión a SQL Server
sqlsrv_close($conn);
?>

              
 

                </select>
                <label for="nombre">Nombre del equipo:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="numero">Numero o serial:</label>
                <input type="text" id="numero" name="numero" require>
                <label for="fecha_compra">Fecha de compra:</label>
                <input type="date" id="fecha_compra" name="fecha_compra" require>
                <label for="fecha_inicio">Fecha inicio grantia:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" require>
                <label for="fecha_final">Fecha final grantia:</label>
                <input type="date" id="fecha_final" name="fecha_final" require>
                <input type="submit" value="Enviar">

                <!-- Campos del formulario 3 -->
            </form>
        </div>

        <div id="formulario4" class="formulario hidden">

            <form method="POST" action="buscarEmpleado.php">

                <input type="submit" value="Buscar  " id="buscar">
            </form>



        </div>
    </main>


    <script>
        // Mostrar el formulario correspondiente al hacer clic en una opción del menú
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const formId = this.getAttribute('data-form');
                document.querySelectorAll('.formulario').forEach(form => {
                    form.classList.add('hidden');
                });
                document.getElementById(formId).classList.remove('hidden');
            });
        });
    </script>

</body>

</html>