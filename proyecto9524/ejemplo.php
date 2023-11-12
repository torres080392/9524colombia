<!DOCTYPE html>
<html lang="en">

<?php
                    // Realizar la conexión a la base de datos
                    include 'conexion.php';

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consultar la base de datos para obtener los productos
                    $sql = "SELECT id_area, nombre_area,cargo_area FROM areas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_area'] . "'>" . $row['cargo_area'] . "</option>";
                        }
                    } else {
                        echo "0 resultados";
                    }

                    $conn->close();
                    ?>

<head>
    <meta charset="UTF-8">
    <title>Menú Horizontal con Formulario</title>
    <style>
        /* Estilos para el formulario desplegable */
        #formulario {
            display: none;
            margin: 20px;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
        }

        #formulario h2 {
            margin-top: 0;
            font-size: 24px;
        }

        #formulario form {
            display: grid;
            gap: 10px;
        }

        #formulario label {
            display: block;
            font-weight: bold;
        }

        #formulario input[type="text"],
        #formulario input[type="email"],
        #formulario input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #formulario input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #formulario input[type="submit"]:hover {
            background-color: #555;
        }

        #formulario1 {
            display: none;
            margin: 20px;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
        }

        #formulario1 h2 {
            margin-top: 0;
            font-size: 24px;
        }

        #formulario1 form {
            display: grid;
            gap: 10px;
        }

        #formulario1 label {
            display: block;
            font-weight: bold;
        }

        #formulario1 input[type="text"],
        #formulario1 input[type="email"],
        #formulario1 input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #formulario1 input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #formulario1 input[type="submit"]:hover {
            background-color: #555;
        }

        /* Estilos para el menú horizontal y el formulario */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        header {
            padding: 20px;

            margin-left: auto;
            background-color: orange;
            color: #fff;
            padding: 10px 0;
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
            color: #fff;
            text-decoration: none;
        }


        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#" class="show-form">Crear empleados</a></li>
                <li><a href="#" class="show-form1">Actualizar informacion empleado</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h3>Modulo empleados</h1>
            <!-- Contenido principal -->
    </main>
    <div id="formulario" class="hidden">
        <h3>Nuevo empleado</h2>
            <form action="ab.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" require>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" require>
                <label for="documento">Documento:</label>
                <input type="text" id="documento" name="documento" require>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" require>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" require>
                <input type="submit" value="Enviar">
            </form>
    </div>

    <div id="formulario2" class="hidden">
        <h3>Nuevo empleado</h2>
            <form action="ab.php" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" require>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" require>
                <label for="documento">Documento:</label>
                <input type="text" id="documento" name="documento" require>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" require>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" require>
                <input type="submit" value="Enviar">
            </form>
    </div>
    <script>
        // Función para mostrar el formulario al hacer clic en "Mostrar Formulario"
        document.querySelector(".show-form").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("formulario").style.display = "block";

        });
        document.querySelector(".show-form1").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("formulario2").style.display = "block";

        });
    </script>
</body>

</html>