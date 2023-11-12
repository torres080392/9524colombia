<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

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
    <link rel="stylesheet" href="css/menuEmpleados.css">

</head>

<body>
    <header>
        <div class="four columns">
            <img src="img/logo.PNG" id="logo">
        </div>
        <button id="navegarBoton">Ir menu principal</button>
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
                <li><a href="#" data-form="formulario1">Nueva area</a></li>
                <li><a href="#" data-form="formulario2">Listado de empleados</a></li>
                <li><a href="#" data-form="formulario3">Crear empleado</a></li>
                <li><a href="buscarEmpleado.php" data-form="formulario4">Buscar empleado</a></li>

            </ul>
        </nav>

    </header>
    <main>
        <div id="formulario1" class="formulario hidden">
            <h2>Crear areas</h2>
            <form action="crearArea.php" method="post">
                <label for="area">Nombre del area:</label>
                <input type="text" id="area" name="area" require>
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" require>
                <input type="submit" value="Enviar">
                <!-- Campos del formulario 1 -->
            </form>

        </div>
        <div id="formulario2" class="formulario hidden">
            <form action="crearEmpleado.php" method="post">
                <h2>Tabla de empleados</h2>

                <table>
                    <tr>
                        <th>Id </th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Area de la compañia </th>
                        <th>Documento</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha creacion</th>
                    </tr>

                    <?php
                    include 'conexion.php';

                    // Llamar al procedimiento almacenado con un parámetro

                    // Preparar la sentencia para llamar al procedimiento almacenado
                    $stmt = $conn->prepare("CALL ObtenerEmpleados(?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("iiiiiiii", $id_empleados, $nom_empleado, $apell_empleado, $nom_area, $doc_empleado, $tel_empleado, $corr_empleado,$fecha_creacion); // 'i' representa un número entero, ajusta si es otro tipo de dato
                    $stmt->execute();

                    $result = $stmt->get_result();

                    if ($result === false) {
                        echo "Error al ejecutar la consulta: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            // Resto del código para recorrer y mostrar los datos en la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_empleados"] . "</td>";
                                echo "<td>" . $row["nom_empleado"] . "</td>";
                                echo "<td>" . $row["apell_empleado"] . "</td>";
                                echo "<td>" . $row["area_empleado"] . "</td>";
                                echo "<td>" . $row["doc_empleado"] . "</td>";
                                echo "<td>" . $row["tel_empleado"] . "</td>";
                                echo "<td>" . $row["corr_empleado"] . "</td>";
                                echo "<td>" . $row["fecha_creacion"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se encontraron elementos.";
                        }
                    }

                    $stmt->close();
                    $conn->close();
                    ?>

                </table>
            </form>
        </div>
        <div id="formulario3" class="formulario hidden">
            <h2>Crear un nuevo empleado</h2>
            <form action="crearEmpleado.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" require>
                <label for="areas">Cargo:</label>
                <select name="areas" id="areas">
                    <?php
                    // Realizar la conexión a la base de datos
                    include 'conexion.php';
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consultar la base de datos para obtener los productos
                    $sql = "SELECT id_areas, nom_area,nom_cargo FROM areas";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['nom_cargo'] . "'>" . $row['nom_cargo'] . "</option>";
                        }
                    } else {
                        echo "0 resultados";
                    }

                    $conn->close();
                    ?>

                </select>

                <label for="documento">Documento:</label>
                <input type="text" id="documento" name="documento" require>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" require>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" require>
                <input type="submit" value="Enviar">

                <!-- Campos del formulario 3 -->
            </form>
        </div>

        <div id="formulario4" class="formulario hidden">

            <form method="POST" action="buscarEmpleado.php">

                <input type="submit" value="Oprima" id="buscar">
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