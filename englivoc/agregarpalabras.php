<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/LogoEngli.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/ingles.css">
    <title>Agregar palabras</title>
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
    <main><main>
    <form id="agregarForm" action="agregar.php" method="post" onsubmit="return agregarPalabra();">
        <h2>Aquí puedes agregar nuevas palabras</h2>
        <label for="palabra_espanol">Palabra en español</label>
        <input type="text" id="palabra_espanol" name="palabra_espanol" required placeholder="Palabra en español">

        <label for="traduccion_ingles">Traducción al inglés</label>
        <input type="text" id="traduccion_ingles" name="traduccion_ingles" required placeholder="Palabra en inglés">

        <button type="submit">Agregar</button>
    </form>
</main>


</body>
<script>
function agregarPalabra() {
    var form = document.getElementById('agregarForm');
    var formData = new FormData(form);

    fetch('agregar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.status === "success") {
            form.reset(); // Vaciar los campos del formulario
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });

    return false; // Prevenir el envío del formulario de forma tradicional
}
</script>
</html>