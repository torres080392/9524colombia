<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
</head>
<body>
    <div class="login-box">
    <img src="img/logo.PNG" id="logo">
        <h2>Iniciar sesion</h2>
        <form method="post" action="validarLogin.php">
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Nombre de Usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Contraseña</label>
            </div>
            <input type="submit" value="Iniciar ">
        </form>
    </div>
</body>
</html>
