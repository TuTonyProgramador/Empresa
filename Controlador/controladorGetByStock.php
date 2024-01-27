<?php
    session_start();

    include_once '../Modelo/proveedorDB.php';
    echo '<link rel="stylesheet" href="../CSS/style.css">';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Obtencion de los datos del formulario
        $stock = $_POST['stock'];

        $codigoProveedor = $_SESSION['codigoProveedor'];
        $proveedor = ProveedorDB::getProveedor($codigoProveedor);

        $productosStock = [];

        $productosStock = ProductoDB::getByStock($stock, $proveedor);

        echo "<form action=''>";
        echo "<table>";
        echo "<tr>
        <th>Codigo Producto</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        </tr>";
        foreach ($productosStock as $producto) {
            echo "<tr>";
            echo "<td>".$producto->getCodigoProducto()."</td>";
            echo "<td>".$producto->getDescripcion()."</td>";
            echo "<td>".$producto->getPrecio()."</td>";
            echo "<td>".$producto->getStock()."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
    }
?>