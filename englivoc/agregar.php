<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $palabra_espanol = trim($_POST['palabra_espanol']);
    $traduccion_ingles = trim($_POST['traduccion_ingles']);
    $nombre = $_SESSION['username'];

    if (!empty($palabra_espanol) && !empty($traduccion_ingles)) {
        // Preparar la consulta para llamar a la función f_agregar
        $sql_insert = "SELECT f_agregar($1, $2, $3)";
        $result_insert = pg_query_params($conexion, $sql_insert, array($palabra_espanol, $traduccion_ingles, $nombre));

        if ($result_insert) {
            echo json_encode(array("status" => "success", "message" => "Palabra agregada con éxito"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error al agregar la palabra"));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Por favor, completa todos los campos"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Método de solicitud no válido"));
}
?>
