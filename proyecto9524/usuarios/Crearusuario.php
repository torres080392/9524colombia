<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Formulario de Creación de Usuarios</title>
  <style>
    /* Estilos del formulario y los elementos del formulario */
    body {
      font-family: Arial, sans-serif;
      background-color: gray;
      margin: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    h2 {
      text-align: center;
    }

    form {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 5 2px 4px rgba(0, 0, 0, 0.1);
      max-width: 300px;
    }

    label {
      display: block;
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }
    .boton-redireccion {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.boton-redireccion:hover {
    background-color: #2980b9;
}


    .hidden {
      display: none;
      
    }
  </style>
</head>

<body>
  <form id="userForm" action="nuevousuario.php" method="post">
    <h3>Crear usuario</h2>
      <label for="usuario">Nombre de usuario:</label>
      <input type="text" id="usuario" name="usuario" required><br><br>
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="Crear">
      <a href="Menuusuario.php" class="boton-redireccion">Menu</a>

  </form>

</body>

</html>