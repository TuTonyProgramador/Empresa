<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Mis Datos</title>
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
    <?php
        session_start();

        include_once '../Modelo/proveedorDB.php';
        
        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);
    ?>
    <form action="../Controlador/controladorUpdateProveedor.php" method="post">
        <h2>Mis Datos</h2>
        <label for="codigoProveedorM">Codigo: </label>
        <input type="text" name="codigoProveedorM" id="codigoProveedorM" value="<?php echo $proveedor->getCodigoProveedor(); ?>" readonly>
        <br>
        <br>
        <label for="pwdM">Password: </label>
        <input type="password" name="pwdM" id="pwdM" required>
        <br>
        <br>
        <label for="nombreM">Nombre:</label>
        <input type="text" name="nombreM" id="nombreM" value="<?php echo $proveedor->getNombre(); ?>" required>
        <br>
        <br>
        <label for="apellidosM">Apellidos: </label>
        <input type="text" name="apellidosM" id="apellidosM" value="<?php echo $proveedor->getApellidos(); ?>" required>
        <br>
        <br>
        <label for="emailM">Email: </label>
        <input type="text" name="emailM" id="emailM" value="<?php echo $proveedor->getEmail(); ?>" required>
        <br>
        <br>
        <input type="submit" id="bModificar" name="bModificar" value="Guardar">
    </form>
</body>
</html>