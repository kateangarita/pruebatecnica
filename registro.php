<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="registro-proceso.php" method="post">
    <label>Nombre:</label>
    <input type="text" name="name" required><br>
    <label>Correo:</label>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Registrarse</button>
</form>
</body>
</html>