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
        
        $productoM = $_SESSION['producto'];

        $producto = ProductoDB::getProductoByCodigo($productoM, $proveedor);

        return $producto;
    }

    /*
    Funcion para eliminar el producto
    Recibe: nada
    Devuelve: nada
    */
    function deleteProducto() {
        $producto = obtenerProductoCodigo();

        if (ProductoDB::deleteProducto($producto)) {
            echo "<script>alert('El Producto ha sido eliminado correctamente');</script>";
            echo "<script>window.location.href='../Vista/formDeleteProducto.php';</script>";
        } else {
            echo "<br> El producto no se ha podido añadir";
        }
    }
?>