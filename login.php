<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login">
    <h1>Inicio de Sesion </h1>
<form action="login-proceso.php" method="post">
    <label>Correo:</label>
    <i class="fas fa-user"></i>
    <input type="text" name="email" required><br>
    <label>Contraseña:</label>
    <i class="fas fa-lock"></i>
    <input type="password" name="password" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
