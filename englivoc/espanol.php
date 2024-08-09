<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LogoEngli.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Español</title>
    <link rel="stylesheet" href="css/ingles.css">

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
                        <th>Palabra en español</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    include("conexion.php");

                    $nombre = $_SESSION['username'];

                    $sql = "SELECT id_pal, palespanol, sigingles FROM palabras INNER JOIN usuario_pal ON id_pal = id_pal1 WHERE nickname1 = '$nombre' ORDER BY RANDOM()";

                    $result = pg_query($conexion, $sql);
                    if (pg_num_rows($result) > 0) {
                        while ($row = pg_fetch_assoc($result)) {
                            echo "<tr id='" . $row['id_pal'] . "' onclick=\"selectWord('" . $row['palespanol'] . "', '" . $row['id_pal'] . "')\">
        <th>" . $row['palespanol'] . "</th>
        </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <div>
    <form id="verificarForm" onsubmit="return verificarPalabras();">
    <h3>Espacio para comprobar la palabra al español</h3>
    <input type="text" id="inputPalabra" name="palabra_seleccionada" placeholder="Palabra en español" readonly>
        <input type="text" id="inputPalabra1" name="palabra_seleccionada1" placeholder="Traducción en inglés" required>
        <input type="hidden" id="inputIdPalEspanol" name="id_pal_espanol">
        <input type="hidden" id="inputIdPalIngles" name="id_pal_ingles">
        <button type="submit">Verificar</button>
    </form>
</div>


    </main>

</body>
<script>
 function verificarPalabras() {
    var form = document.getElementById('verificarForm');
    var formData = new FormData(form);

    var sonidoCorrecto = new Audio('video/acierto.mp3');
    var sonidoIncorrecto = new Audio('video/error.mp3');

    fetch('verificar_espanol.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.id_pal) {
                // Si se recibió el ID de la palabra, actualizar el input correspondiente
                document.getElementById('inputIdPalEspanol').value = data.id_pal;
                sonidoCorrecto.play();

                // Ocultar la fila correspondiente utilizando el ID de la fila
                var row = document.getElementById(data.id_pal);
                if (row) {
                    row.style.display = 'none';
                }

            } else if (data.error) {
                // Manejar el error si no se encontró la palabra
                console.error(data.error);
                sonidoIncorrecto.play();
            }

            // Vaciar los campos de los inputs
            document.getElementById('inputPalabra').value = '';
            document.getElementById('inputPalabra1').value = '';
            document.getElementById('inputIdPalEspanol').value = '';
            document.getElementById('inputIdPalIngles').value = '';
        })
        .catch(error => console.error('Error:', error));

    return false; // Prevenir el envío del formulario tradicional
}


    function selectWord(word, wordId) {
    // Asignar la palabra seleccionada al input correspondiente
    document.getElementById('inputPalabra').value = word;
    document.getElementById('inputIdPalIngles').value = wordId;

    // Limpia el campo de traducción para que el usuario pueda ingresar la traducción
    document.getElementById('inputPalabra1').value = '';
    
    // Enfoca el input donde el usuario debe ingresar la traducción
    document.getElementById('inputPalabra1').focus();
}

</script>

</html>