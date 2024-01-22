<?php
    include_once 'proveedor.php';
    include_once 'proveedorDB.php';
    include_once 'producto.php';

    class ProductoDB {
        /*
        Funcion para insertar un producto nuevo
        Recibe: un objeto de la clase proveedor y un objeto de la clase producto
        Devuelve: false si no se ha insertado el producto
        Devuelve: true si se ha insertado el producto
        */
        public static function addProducto(Proveedor $proveedor, Producto $producto): bool {
            $result = false;

            // Establecer conexion con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();

            // Preparar la consulta sql 
            $sql = "INSERT INTO producto (codigoProducto, descripcion, precio, stock, codigoProveedor) VALUES (:codigoProducto, :descripcion, :precio, :stock, :codigoProveedor)";

            $sentencia = $conexion->prepare($sql);

            $sentencia->bindValue(":codigoProducto", $producto->getCodigoProducto()); 
            $sentencia->bindValue(":descripcion", $producto->getDescripcion()); 
            $sentencia->bindValue(":precio", $producto->getPrecio());
            $sentencia->bindValue(":stock", $producto->getStock()); 
            $sentencia->bindValue(":codigoProveedor", $proveedor->getCodigoProveedor()); 

            $result = $sentencia->execute();

            return $result;
        }

        /*
        Funcion para consultar un producto por su stock
        Recibe: una string que es la descripcion y un objeto de la clase proveedor
        Devuelve: un array con los productos que coincidan con esa descripcion
        */
        public static function getByDescripcion(string $descripcion, Proveedor $proveedor): array {
            // Establecer conexión con la base de datos
            include_once('../Conexion/obtenerConexion.php');
            $conexion = ObtenerConexion::obtenerConexion();

            // Preparar la consulta
            $sql = "SELECT * FROM producto WHERE descripcion = :descripcion AND codigoProveedor = :codigoProveedor";
            $sentencia = $conexion->prepare($sql);

            // Ejecutar la consulta
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Producto");
            $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->bindParam(":codigoProveedor", $proveedor->getCodigoProveedor()); 
            $sentencia->execute();

            while ($productoDB = $sentencia->fetch()){
                $proveedor = ProveedorDB::getProveedor($productoDB['codigoProveedor']);
                $producto = new Producto($productoDB['codigoProducto'],$productoDB['descripcion'],$productoDB['precio'],$productoDB['stock'], $proveedor);
                $productos = $producto;
            }

            return $productos;
        }

        /*
        Funcion para devolver productos de un proveedor
        Recibe: el codigo del proveedor
        Devuelve: un array con los productos que tiene
        */
        public static function getProducto(Proveedor $proveedor): array {
            // Establecer conexión con la base de datos
            include_once('../Conexion/obtenerConexion.php');
            $conexion = ObtenerConexion::obtenerConexion();

            $sql = "SELECT * FROM producto WHERE codigoProveedor = :codigoProveedor";
            $sentencia = $conexion->prepare($sql);

            // Ejecutar la consulta
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Producto");
            $sentencia->bindValue(':codigoProveedor', $proveedor->getCodigoProveedor());
            $sentencia->execute();

            while ($productoDB = $sentencia->fetch()){
                $proveedor = ProveedorDB::getProveedor($productoDB['codigoProveedor']);
                $producto = new Producto($productoDB['codigoProducto'],$productoDB['descripcion'],$productoDB['precio'],$productoDB['stock'], $proveedor);
                $productos = $producto;
            }

            return $productos;
        }

        /*
        Funcion para actualizar un producto
        Recibe: un objeto de la clase proveedor y un objeto de la clase producto
        Devuelve: false si no se ha actualizado el producto
        Devuelve: true si se ha actualizado el producto
        */
        public static function updateProducto(Producto $producto): bool {
            $result = false;

            // Establecer conexión con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();
    
            // Preparar la consulta SQL
            $sql = "UPDATE producto SET descripcion = :descripcion, precio = :precio, stock = :stock WHERE codigoProducto = :codigoProducto AND codigoProveedor = :codigoProveedor";
    
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindValue(":descripcion", $producto->getDescripcion());
            $sentencia->bindValue(":precio", $producto->getPrecio());
            $sentencia->bindValue(":stock", $producto->getStock());
            $sentencia->bindValue(":codigoProducto", $producto->getCodigoProducto());
            $sentencia->bindValue(":codigoProveedor", $producto->getProveedor()->getCodigoProveedor());

            $result = $sentencia->execute();

            return $result;
        }

        /*
        Funcion para eliminar un producto
        Recibe: un objeto de la clase proveedor y un objeto de la clase producto
        Devuelve: false si no se ha eliminado el producto
        Devuelve: true si se ha eliminado el producto
        */
        public static function deleteProducto(Producto $producto): bool {
            $result = false;

            // Establecer conexión con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();
    
            // Preparar la consulta SQL
            $sql = "DELETE FROM producto WHERE codigoProducto = :codigoProducto AND codigoProveedor = :codigoProveedor";
    
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(":codigoProducto", $producto->getCodigoProducto()); 
            $sentencia->bindValue(":codigoProveedor", $producto->getProveedor()->getCodigoProveedor()); 

            $result = $sentencia->execute();

            return $result;
        }

        /*
        Funcion para consultar un producto por su stock
        Recibe: un int que es el stock y un objeto de la clase proveedor
        Devuelve: un objeto de la clase produto
        */
        public static function getByStock(int $stock, Proveedor $proveedor): array {
            // Establecer conexión con la base de datos
            include_once('../Conexion/obtenerConexion.php');
            $conexion = ObtenerConexion::obtenerConexion();

            // Preparar la consulta
            $sql = "SELECT * FROM producto WHERE stock <= :stock AND codigoProveedor = :codigoProveedor";
            $sentencia = $conexion->prepare($sql);

            // Ejecutar la consulta
            $sentencia->setFetchMode(PDO::FETCH_CLASS, "Producto");
            $sentencia->bindParam(':stock', $stock);
            $sentencia->bindParam(":codigoProveedor", $proveedor->getCodigoProveedor()); 
            $sentencia->execute();

            while ($productoDB = $sentencia->fetch()){
                $proveedor = ProveedorDB::getProveedor($productoDB['codigoProveedor']);
                $producto = new Producto($productoDB['codigoProducto'],$productoDB['descripcion'],$productoDB['precio'],$productoDB['stock'], $proveedor);
                $productos = $producto;
            }

            return $productos;
        }
    }
?>