<?php
include("conexion.php");

$palabra_seleccionada1 = $_POST['palabra_seleccionada1'];

// Construir la consulta SQL
$sql = "SELECT * FROM palabras WHERE palespanol = '$palabra_seleccionada1'";

// Ejecutar la consulta
$result = pg_query($conexion, $sql);

if ($result && pg_num_rows($result) > 0) {
    if ($row = pg_fetch_assoc($result)){
        $idpales = $row['id_pal'];
        echo json_encode(array("id_pal" => $idpales));
    }
} else {
    echo json_encode(array("error" => "No se encontró la palabra"));
}
?>
