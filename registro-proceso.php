<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // (Consulta SQL para insertar nuevos registros)
    $sql = "INSERT INTO dat (Nombre, Correo, Contraseña) VALUES ('$name','$email','$password');";
    $conn2 = $conn->prepare($sql);

    $resultado = $conn2->execute();
    
    if ($resultado) {
        echo "Nuevo usuario insertado correctamente.";
    } else {
        echo "Error al insertar el usuario: " . $conn->error;
    }
     $conn->close();
    header('Location: index.php');
    exit;
}
?>
