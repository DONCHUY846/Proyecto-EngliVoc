<?php
include("conexion.php");

$palabra_seleccionada = $_POST['palabra_seleccionada'];
$palabra_seleccionada1 = $_POST['palabra_seleccionada1'];
$id_pal_espanol = $_POST['id_pal_espanol'];
$id_pal_ingles = $_POST['id_pal_ingles'];

$sql = "SELECT * FROM palabras WHERE palespanol = $1 AND sigingles = $2";
$result = pg_prepare($conexion, "verify_words", $sql);
$result = pg_execute($conexion, "verify_words", array($palabra_seleccionada, $palabra_seleccionada1));

if (pg_num_rows($result) > 0) {
    // Devolver respuesta para ocultar las filas
    echo json_encode(array("status" => "correcto", "idEspanol" => $id_pal_espanol, "idIngles" => $id_pal_ingles));
} else {
    // Devolver respuesta para mantener las filas
    echo json_encode(array("status" => "incorrecto"));
}
?>
