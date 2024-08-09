<?php
include("conexion.php");

if (isset($_GET['id_pal'])) {
    // Asegurarse de que el ID sea un número entero
    $id_pal = intval($_GET['id_pal']);

    // Consulta para eliminar la palabra de la base de datos
    $sql = "select f_01100101 ($id_pal)";
    $result = pg_query($conexion, $sql);

    if ($result) {
        echo "<script>alert('Palabra inhabilitada correctamente.'); window.history.go(-1);</script>";
    } else {
        echo "<script>alert('Error al inhabilitar la palabra.'); window.history.go(-1);</script>";
    }
} else {
    echo "<script>alert('ID de palabra no proporcionado.');window.history.go(-1);</script>";
}
?>
