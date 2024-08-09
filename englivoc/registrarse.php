<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LogoEngli.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
<main>
    <form action="registro.php" method="post">
        <h1 style="text-align: center;">Registro</h1>
        <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" id="nickname" name="nickname" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmar contraseña</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>
        </div>
        <a href="index.html" style="text-align: center;">Volver</a>
        <button type="submit">Registrarse</button>
       
    </form>
</main>

</body>
</html>