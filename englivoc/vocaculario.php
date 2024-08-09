<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EngliVoc</title>
    <link rel="stylesheet" href="css/syle.css">
    <link rel="shortcut icon" href="img/LogoEngli.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body>
<header>
        <div class="header-container">
            <div class="logo">
                <img src="img/LogoEngli.png" alt="logo">
            </div>
            <nav>
                <ul>
                    <li><a href="opciones.html">Inicio</a></li>
                    <li><a href="cerrarsesion.php">Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Español</th>
                        <th>Ingles</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    $nombre = $_SESSION['username'];
                    include("conexion.php");

                    // Número de registros por página
                    $registros_por_pagina = 10;

                    // Página actual
                    $pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
                    $inicio = ($pagina_actual - 1) * $registros_por_pagina;

                    // Consulta para contar el total de registros
                    $sql_total = "SELECT COUNT(*) as total FROM palabras INNER JOIN usuario_pal ON id_pal = id_pal1 WHERE nickname1 = '$nombre'";
                    $result_total = pg_query($conexion, $sql_total);
                    $total_filas = pg_fetch_assoc($result_total)['total'];
                    $total_paginas = ceil($total_filas / $registros_por_pagina);

                    // Consulta para obtener las palabras en español e inglés con límite y offset para la paginación
                    $sql = "SELECT id_pal, palespanol, sigingles FROM palabras INNER JOIN usuario_pal ON id_pal = id_pal1 WHERE nickname1 = '$nombre' ORDER BY id_pal LIMIT $registros_por_pagina OFFSET $inicio";
                    $result = pg_query($conexion, $sql);

                    if (pg_num_rows($result) > 0) {
                        while ($row = pg_fetch_assoc($result)) {
                            $idpal = intval($row['id_pal']);
                            echo "<tr id='fila_espanol_$idpal' onclick=\"seleccionarPalabra1('$idpal', '" . htmlspecialchars($row['palespanol'], ENT_QUOTES, 'UTF-8') . "', '" . htmlspecialchars($row['sigingles'], ENT_QUOTES, 'UTF-8') . "')\">";
                            echo "<td>" . htmlspecialchars($row['palespanol']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sigingles']) . "</td>";
                            echo "<td><a href='eliminar_palabra.php?id_pal=$idpal' onclick=\"return confirm('¿Estás seguro de que quieres inhabilitar esta palabra?');\">Inhabilitar</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No se encontraron palabras en español.</td></tr>";
                    }
                    ?>




                </tbody>
            </table>


        </div>

        <!-- Paginación -->
        <div class="pagination">
            <?php
            if ($pagina_actual > 1) {
                echo "<a href='?pagina=" . ($pagina_actual - 1) . "'>&laquo; Anterior</a>";
            }

            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($i == $pagina_actual) {
                    echo "<a class='active' href='?pagina=$i'>$i</a>";
                } else {
                    echo "<a href='?pagina=$i'>$i</a>";
                }
            }

            if ($pagina_actual < $total_paginas) {
                echo "<a href='?pagina=" . ($pagina_actual + 1) . "'>Siguiente &raquo;</a>";
            }
            ?>
        </div>




    </main>

</body>



</html>