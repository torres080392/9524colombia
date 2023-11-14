<!DOCTYPE html>
<html lang="en">

<head>

    <style>
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

    button {

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

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: black;
        text-decoration: none;
    }

    .hidden {
        display: none;
    }

    /* Estilos para el formulario desplegable */
    /* Estilos para los formularios */

    .formulario {
        margin: 5px;
        padding: 30px;
        border: 5px solid #ccc;
        border-radius: 5px;
    }

    .formulario h2 {
        margin-top: 0;
        font-size: 24px;
    }

    .formulario form {
        display: grid;
        gap: 10px;
    }

    #tipo_usuario {
        width: calc(20% - 20px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .formulario label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .formulario input[type="text"],
    .formulario input[type="email"],
    .formulario input[type="select"] {
        width: calc(20% - 20px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .formulario input[type="submit"] {
        background-color: green;
        color: black;
        cursor: pointer;
        transition: background-color 0.3s;
        width: calc(5% - 10px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .formulario input[type="submit"] {
        background-color: #333;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .formulario input[type="submit"]:hover {
        background-color: #555;
    }
    </style>
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
        <button onclick="regresar()">Regresar</button>

        <script>
        function regresar() {
            // Utilizar la función para retroceder en la historia del navegador
            window.history.back();
        }
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
                <li><a href="#" data-form="formulario1">Nuevo tipo de usuario</a></li>
                <li><a href="#" data-form="formulario2">Listado de usuarios</a></li>
                <li><a href="#" data-form="formulario3">Crear nuevo usuario</a></li>
                <li><a href="#" data-form="formulario4">Buscar usuario</a></li>

            </ul>
        </nav>

    </header>
    <main>
        <div id="formulario1" class="formulario hidden">
            <h2>Crear tipo de usuario</h2>
            <form action="crearTipoUsuario.php" method="post">
                <label for="usuario">Tipo de usuario:</label>
                <input type="text" id="usuario" name="usuario" require>
                <input type="submit" value="Enviar">
                <!-- Campos del formulario 1 -->
            </form>

        </div>
        <div id="formulario2" class="formulario hidden">
            <form action="listaUsuarios.php" method="post">
                <button id="navegarBotonLista">Oprimir para ver el listado de usuarios</button>
                <!-- Script JavaScript para la navegación -->
                <script>
                // Obtén una referencia al botón
                var botonNavegar = document.getElementById("navegarBoton");

                // Agrega un controlador de eventos para el clic en el botón
                botonNavegar.addEventListener("click", function() {
                    // Navega a la otra página
                    window.location.href =
                        "listaUsuarios.php"; // Reemplaza "otra_pagina.html" con la URL de la página a la que deseas navegar.
                });
                </script>

            </form>
        </div>
        <div id="formulario3" class="formulario hidden">
            <h2>Crear un nuevo usuario</h2>
            <form action="crearUsuario.php" method="post">
                <label for="tipo_usuario">Selecciones el tipo de usuario :</label>
                <select name="tipo_usuario" id="tipo_usuario">
                    <?php
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
                
                // Llama al procedimiento almacenado ObtenerUsuarios
                $sql = "EXEC ObtenerTipoUsuarios";
                $query = sqlsrv_query($conn, $sql);
                
                if ($query === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                
                if (sqlsrv_has_rows($query)) {
                    while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                        echo "<option value='" . $row['idtipo_usuario'] . "'>"  .  $row['tipo_usuario'] . "</option>";
                    }
                } else {
                    echo "0 resultados";
                }
                
                // Cierra la conexión a SQL Server
                sqlsrv_close($conn);
                ?>

                </select>
                <label for="nombre">Nombre del usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" require>
                <label for="correo">Correo:</label>
                <input type="text" id="correo" name="correo" require>
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" require>
                <label for="documento">Documento o NIT:</label>
                <input type="text" id="documento" name="documento" require>
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