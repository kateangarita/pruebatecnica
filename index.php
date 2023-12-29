<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
</head>
<body>
    <h1 style="text-align: center; font-weight: bold;"> Bienvenidos</h1>
<?php
session_start();
require_once 'config.php';

// Verificar si el usuario está logueado
if (isset($_SESSION['email'])) {
    // El usuario está logueado
    $sql = "SELECT * FROM dat where Correo=? AND Contraseña=?";
    $conn3 = $conn ->prepare($sql);

    $conn3 -> bind_param("ss",$_SESSION['email'],$_SESSION['password']);
    $resultado = $conn3 -> execute();

    if ($resultado) {
        $resultado = $conn3->get_result();
     echo "En esta pagina encontraras el listado de los pokemones " ;
   
    $pokemonIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

   // HTML para el grid
echo '<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">';

foreach ($pokemonIds as $pokemonId) {
    // URL de la API de Pokémon para obtener información de un Pokémon específico
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemonId;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === FALSE) {
        die('Error al realizar la solicitud a la API de Pokémon: ' . curl_error($ch));
    }
    curl_close($ch);
    $data = json_decode($response, TRUE);

    if ($data === NULL) {
        die('Error al decodificar la respuesta JSON');
    }
    echo '<div style="border: 1px solid #ddd; padding: 10px; text-align: center;">';
    echo '<img src="' . $data['sprites']['front_default'] . '" alt="' . $data['name'] . '" style="max-width: 100px;"><br>';
    echo 'Nombre: ' . $data['name'] . '<br>';
    echo 'ID: ' . $data['id'] . '<br>';
    echo 'Altura: ' . $data['height'] . '<br>';
    echo 'Peso: ' . $data['weight'] . '<br>';
    echo '<p><button style="background-color: blue; color: white; padding: 10px 20px; border: none; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">';
    echo '<a href="pokemones.php?id=' . $pokemonId . '" style="color: white; text-decoration: none;">Ver detalles ' . $pokemonId . '</a>';
    echo '</button></p>';
    echo '</div>';
}
echo '<br><a href="logout.php">Cerrar sesión</a>';
echo '</div>';
     } else {
    echo "Error al insertar el usuario: " . $conn3->error;
     }
     $conn3->close();
} else {
    header('Location: login.php');
    exit;
}
?>