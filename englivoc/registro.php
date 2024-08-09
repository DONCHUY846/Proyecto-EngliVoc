<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Validar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $nickname = trim($_POST['nickname']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $nombre = trim($_POST['nombre']);
    $apellido_paterno = trim($_POST['apellido_paterno']);
    $apellido_materno = trim($_POST['apellido_materno']);

    // Verificar que las contraseñas coincidan
    if ($password != $confirm_password) {
        echo "<script>alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');</script>";
        exit();
    }

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nickname, contrasenia, nombre, apellidopat, apellidomat)
            VALUES ($1, $2, $3, $4, $5)";

    // Preparar y ejecutar la consulta
    $result = pg_prepare($conexion, "registro_query", $sql);
    $result = pg_execute($conexion, "registro_query", array($nickname, $password_hash, $nombre, $apellido_paterno, $apellido_materno));

    // Verificar si la inserción fue exitosa
    if ($result) {
        echo "<script>alert('Registro exitoso');window.location.href='opciones.html';</script>";
    } else {
        echo "<script>alert('Ocurrió un error al registrar tus datos. Por favor, inténtalo de nuevo.');window.history.go(-1);</script>";
    }
}
?>
