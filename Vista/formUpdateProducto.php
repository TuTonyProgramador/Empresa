<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Actualizar Producto</title>
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
        include_once '../Controlador/controladorUpdateProducto.php';
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
        <input type="submit" id="bSelecionar" name="bSelecionar" value="Seleccionar">
    </form>

    <?php
        if (isset($_POST['bSelecionar'])){
            include_once '../Controlador/controladorUpdateProducto.php';
            $producto = obtenerProductoCodigo();
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="codigoProductoM">Código Producto: </label>
        <input type="text" name="codigoProductoM" value="<?php echo $producto->getCodigoProducto() ?>" id="codigoProductoM" required readonly>
        <br>
        <br>
        <label for="descripcionM">Descripcion: </label>
        <input type="text" name="descripcionM" value="<?php echo $producto->getDescripcion() ?>" id="descripcionM" required>
        <br>
        <br>
        <label for="precioM">Precio: </label>
        <input type="number" name="precioM" value="<?php echo $producto->getPrecio() ?>" id="precioM" required>
        <br>
        <br>
        <label for="stockM">Stock: </label>
        <input type="number" name="stockM" value="<?php echo $producto->getStock() ?>" id="stockM" required>
        <br>
        <br>
        <input type="submit" id="bModificar" name="bModificar" value="Guardar">
    </form>

    <?php
        } 
        
        if (isset($_POST['bModificar'])) {
            actualizarProducto();
        }
    ?>
</body>
</html>