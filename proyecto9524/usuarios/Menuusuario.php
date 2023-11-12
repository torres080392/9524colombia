<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menú Horizontal Desplegable</title>
   
    <style>
      /* Estilos para el menú horizontal desplegable */
      body{
        background-color: gray;
      }
nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #333;
  overflow: hidden;
}

nav ul li {
  float: left;
}

nav ul li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

nav ul li a:hover {
  background-color: #ddd;
  color: black;
}

/* Dropdown estilos */
.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
  display: block;
}

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Productos</a>
                <div class="dropdown-content">
                <a href="#">Producto 1</a>
                    <a href="skajj.php">Producto 2</a>
                    <a href="#">Producto 3</a>
                    <a href="#">Producto 4</a>
                    <a href="#">Producto 5</a>
                    <a href="#">Producto 6</a>
                </div>
            </li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>
    <script src="script.js"></script>
</body>
</html>
