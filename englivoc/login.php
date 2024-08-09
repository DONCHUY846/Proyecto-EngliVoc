<?php
session_start();
include("conexion.php");

$nombre = $_POST['username'];
$contrasena = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE nickname=$1 AND contrasenia=$2";
$result = pg_prepare($conexion, "login_query", $query);
$consulta = pg_execute($conexion, "login_query", array($nombre, $contrasena));

if ($conexion){
    if (pg_num_rows($consulta) == 0){
        echo "<script>
                alert('Usuario o contraseña incorrectos');
                window.location.href='iniciosesion.php';
              </script>";
    } else {
      $_SESSION['username'] = $nombre;

        header("Location: opciones.html");
        exit();
    }
    pg_close($conexion);
}
// para enviar datos a otro utiliza este 
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: iniciosesion.php");
//     exit();
// }
// $nombre = $_SESSION['username'];
?>
