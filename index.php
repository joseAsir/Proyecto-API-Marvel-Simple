<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de cURL
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardamos el resultado
$result = curl_exec($ch);

// Transformar el resultado en un array asociativo
$data = json_decode($result, true);

// Cerrar la conexión
curl_close($ch);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="La próxima película de Marvel"/>
    <title>La próxima película de Marvel</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center my-5">
        <!-- Texto en negrita -->
        <h1 class="display-4 mb-4"><strong>La próxima película de Marvel</strong></h1>

        <!-- Imagen de la película -->
        <section>
            <img src="<?= $data['poster_url'] ?>" alt="Poster de <?= $data['title'] ?>" class="img-fluid rounded mb-4" style="max-width: 300px;">
        </section>

        <!-- Información de la película -->
        <h2 class="h3 mb-2"><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h2>
        <p class="lead">Fecha de estreno: <?= $data["release_date"] ?></p>

        <!-- Próxima película -->
        <p class="mt-3 fs-5">
            <strong>Próxima película:</strong> <?= $data["following_production"]["title"] ?>
        </p>
    </div>

</body>
</html>

