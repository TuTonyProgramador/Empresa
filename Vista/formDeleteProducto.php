<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Eliminar Producto</title>
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
        include_once '../Controlador/controladorDeleteProducto.php';
        $productos = [];

        $productos = obtenerProductos();
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        <select name="productoM" id="productoM" required>
            <?php
                foreach ($productos as $producto) {
                    echo '<option value="'.$producto->getCodigoProducto().'">'.$producto->getCodigoProducto().'</option>';
                }
            ?>
        </select>
        <input type="submit" id="bEliminar" name="bEliminar" value="Eliminar">
    </form>

    <?php
        if (isset($_POST['bEliminar'])) {
            include_once '../Controlador/controladorDeleteProducto.php';
            $_SESSION['producto'] = $_POST['productoM'];
            $producto = obtenerProductoCodigo(); 
           
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Confirmación borrado de producto</h2>
        <p>¿Estás seguro de que deseas borrar el producto?</p>
        <input type="submit" name="confirmarBorrado" id="confirmarBorrado" value="Confirmar Borrado">
        <input type="submit" name="cancelar" id="cancelar" value="Cancelar">
    </form>

    <?php 
        } elseif (isset($_POST['confirmarBorrado'])) {

            deleteProducto();
        } elseif(isset($_POST['cancelar'])) {
            echo "<script>alert('El Producto no se ha eliminado');</script>";
        }
    ?>
</body>
</html>