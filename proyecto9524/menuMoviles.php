<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>Guardar y resetear formulario</title>
    <script>
        window.onload = function() {
            document.getElementById('miFormulario').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe
                // Agrega aquí la lógica para guardar los datos (puedes hacer una petición AJAX o lo que necesites)
                alert('Datos guardados'); // Ejemplo: mensaje de alerta

                document.getElementById('miFormulario').reset(); // Resetea el formulario
            });
        }
    </script>
</head>
<body>
    <h2>Guardar y resetear formulario</h2>

    <form id="miFormulario">
        <!-- Campos del formulario -->
        <label for="campo1">Campo 1:</label>
        <input type="text" id="campo1" name="campo1"><br><br>

        <label for="campo2">Campo 2:</label>
        <input type="text" id="campo2" name="campo2"><br><br>

        <input type="submit" value="Guardar"> <!-- Botón para guardar -->
    </form>
</body>
</html>
