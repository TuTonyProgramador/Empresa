<?php
    /*
    Funcion para mostrar los productos
    Recibe: nada
    Devuelve: nada
    */
    function mostrarTodos() {
        session_start();

        include_once '../Modelo/proveedorDB.php';
        include_once '../Modelo/productoDB.php';

        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);

        $productos = [];
        $productos = ProductoDB::getProducto($proveedor);

        echo "<table border='1'>";
        echo "<tr>
        <th>Codigo Producto</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        </tr>";
        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>".$producto->getCodigoProducto()."</td>";
            echo "<td>".$producto->getDescripcion()."</td>";
            echo "<td>".$producto->getPrecio()."</td>";
            echo "<td>".$producto->getStock()."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>