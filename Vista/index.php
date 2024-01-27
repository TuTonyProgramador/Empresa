<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Registro</title>
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
    <form action="../Controlador/controladorRegistro.php" method="post">
        <label for="codigoProveedor">Código:</label>
        <input type="text" name="codigoProveedor" id="codigoProveedor" required>
        <br>
        <br>
        <label for="pwd">Password: </label>
        <input type="password" name="pwd" id="pwd" required>
        <br>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos" required>
        <br>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>
        <br>
        <br>
        <input type="submit" id="bRegistrar" name="bRegistrar" value="Registrarse">
    </form>
</body>
</html>