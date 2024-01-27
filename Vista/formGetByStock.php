<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Obtener Producto Stock</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="../IMG/logo.png" alt="Logo">
        </div>
        <a href="formMostrarProductos.php">Mostrar Productos</a>
        <a href="formAddProducto.php">Añadir Productos</a>
        <a href="formGetByDescripcion.php">Obtener productos Descripcion</a>
        <a href="formGetByStock.php">Obtener productos Stock</a>
        <a href="formUpdateProducto.php">Actualizar Productos</a>
        <a href="formDeleteProducto.php">Eliminar Productos</a>
        <a href="formUpdateProveedor.php">Mis Datos</a>
        <a href="formLogin.php">Cerrar Sesión</a>
    </nav>
    <br>
    <form action="../Controlador/controladorGetByStock.php" method="post">
        <label for="stock">Stock: </label>
        <input type="text" name="stock" id="stock" required>
        <br>
        <br>
        <input type="submit" id="bObtenerP" name="c" value="Obtener Productos">
    </form>
</body>
</html>