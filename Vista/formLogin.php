<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Login</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="../IMG/logo.png" alt="Logo">
        </div>
        <a href="index.php">Registrar</a>
        <a href="formLogin.php">Iniciar Sesión</a>
    </nav>
    <br>
    <form action="../Controlador/controladorLogin.php" method="post">
        <label for="codigoProveedor">Código:</label>
        <input type="text" name="codigoProveedor" id="codigoProveedor" required>
        <br>
        <br>
        <label for="pwd">Password: </label>
        <input type="password" name="pwd" id="pwd" required>
        <br>
        <br>
        <input type="submit" id="bIniciar" name="bIniciar" value="Acceder">
    </form>
</body>
</html>