<?php
    session_start();

    include_once '../Modelo/proveedorDB.php';
    include_once '../Modelo/productoDB.php';

    /*
    Funcion para obtener un array de productos
    Recibe: nada
    Devuelve: un array de productos
    */
    function obtenerProductos(): array {
        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);
        $productos = ProductoDB::getProducto($proveedor);

        return $productos;
    }

    /*
    Funcion para obtener el producto con el codigo
    Recibe: nada
    Devuelve: un objeto de la clase producto
    */
    function obtenerProductoCodigo(): Producto {
        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);

        $productoM = $_POST['productoM'];

        $producto = ProductoDB::getProductoByCodigo($productoM, $proveedor); 

        return $producto;
    }

    /*
    Funcion para actualizar el producto
    Recibe: nada
    Devuelve: nada
    */
    function actualizarProducto() {
        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);

        // Obtencion datos formulario
        $codigoProductoM = $_POST['codigoProductoM'];
        $descripcionM = $_POST['descripcionM'];
        $precioM = $_POST['precioM'];
        $stockM = $_POST['stockM'];

        $updateProducto = new Producto($codigoProductoM, $descripcionM, $precioM, $stockM, $proveedor);

        if (ProductoDB::updateProducto($updateProducto)) {
            echo "<script>alert('El Producto ha sido actualizado correctamente');</script>";
            echo "<script>window.location.href='../Vista/formUpdateProducto.php';</script>";
        } else {
            echo "<br> El proveedor no se ha podido modificar";
        }
    }
?>