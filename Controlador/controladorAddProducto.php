<?php
    session_start();

    include_once '../Modelo/proveedorDB.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Obtencion de los datos del formulario
        $codigoProducto = $_POST['codigoProducto'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);
        $producto = new Producto($codigoProducto, $descripcion, $precio, $stock, $proveedor);

        if (ProductoDB::addProducto($proveedor, $producto)) {
            echo "<script>alert('El Producto ha sido añadido correctamente');</script>";
            echo "<script>window.location.href='../Vista/formAddProducto.php';</script>";
        } else {
            echo "<br> El producto no se ha podido añadir";
        }
    }
?>