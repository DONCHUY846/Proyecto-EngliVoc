<?php
session_start();

// Cerrar la conexión a la base de datos si existe
if (isset($conexion)) {
    pg_close($conexion);
}

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a la página principal
header("Location: index.html");
exit();
?>
