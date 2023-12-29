<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // (Consulta SQL para verificar email y password)
    $sql = "SELECT * FROM dat where Correo=? AND Contraseña=?";
    $conn4 = $conn ->prepare($sql);

   $conn4 ->bind_param("ss", $email, $password);

    $conn4->execute();

    $resultado = $conn4->get_result();

    if ($resultado->num_rows > 0) {
        session_start();
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit;
} else {
 header('Location: registro.php');
 exit;
}}?>