<?php 
include ("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="shortcut icon" href="img/LogoEngli.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
<div class="login-container">
    <div class="image-container">
        <img src="img/LogoEngli.png" alt="LogoEnglivoc">
    </div>
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="registrarse.php">Registrarse</a><br>
            <a href="index.html" style="text-align: center;">Volver</a>

            <button type="submit">Ingresar</button>

            
        </form>
    </div>
</body>
</html>