<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pokémon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <?php
    // Obtener el ID del Pokémon desde la URL
    $pokemonId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($pokemonId) {

        $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemonId;
        $response = file_get_contents($url);
        $pokemonData = json_decode($response, TRUE);

        if ($pokemonData) {
            ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $pokemonData['sprites']['front_default']; ?>" alt="<?php echo $pokemonData['name']; ?>">
                <div class="card-body">
                    <h5 class="card-title">Detalles del Pokémon <?php echo $pokemonId; ?></h5>
                    <br> 
                 </br>
                    <h6 class="card-subtitle mb-2 text-muted">Habilidades:</h6>
                    <br>
                 </br>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($pokemonData['abilities'] as $ability) {
                            echo '<li class="list-group-item">' . $ability['ability']['name'] . '</li>';
                        }
                        ?>
                    </ul>
                    <a href="index.php" class="btn btn-primary">Volver a la lista de Pokémones</a>
                </div>
            </div>
            <?php
        } else {
            echo 'No se pudo obtener la información del Pokémon.';
        }
    } else {
        echo 'ID del Pokémon no proporcionado.';
    }
    ?>
</body>
</html>

