<?php
    include_once 'producto.php';
    include_once 'proveedor.php';
    include_once 'productoDB.php';

    class ProveedorDB {
        /*
        Funcion para registrar un nuevo proveedor en la base de datos
        Recibe: el objeto que se quiere registrar de la clase proveedor
        Devuelve: false si no se ha registrado
        Devuelve: true si se ha registrado
        */
        public static function addProveedor(Proveedor $proveedor): bool {
            $result = false;

            // Establecer conexión con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();

            $sql = "INSERT INTO proveedor (codigoProveedor, pwd, nombre, apellidos, email) VALUES (:codigoProveedor, :pwd, :nombre, :apellidos, :email)";
            $sentencia = $conexion->prepare($sql);

            $result = $sentencia->execute([
                'codigoProveedor' => $proveedor->getCodigoProveedor(),
                'pwd' => password_hash($proveedor->getPwd(), PASSWORD_DEFAULT),
                'nombre' => $proveedor->getNombre(), 
                'apellidos' => $proveedor->getApellidos(), 
                'email' => $proveedor->getEmail()
            ]);

            return $result;
        }

        /*
        Funcion para comrpobar el inicio de sesion de un proveedor
        Recibe: el codigo del proveedor
        Devuelve: false si no se ha iniciado sesion
        Devuelve: true si se ha iniciado sesion
        */
        public static function getProveedor(string $codigoProveedor): Proveedor {
            // Establecer conexión con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();

            $sql = "SELECT * FROM proveedor WHERE codigoProveedor = :codigoProveedor";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute(['codigoProveedor' => $codigoProveedor]);

            $proveedor = $sentencia->fetch(PDO::FETCH_ASSOC);

            // Montar el proveedor
            $proveedorDevolver = new Proveedor($proveedor['codigoProveedor'], $proveedor['pwd'], $proveedor['nombre'], $proveedor['apellidos'], $proveedor['email']);

            // Esto va al controlador
            /*if ($proveedor && password_verify($proveedor->getPwd(), $proveedor['pwd'])) {
            }*/

            return $proveedorDevolver;
        }

        /*
        Funcion para actualizar un proveedor
        Recibe: un objeto de la clase proveedor
        Devuelve: false si no se ha actualizado el proveedor
        Devuelve: true si se ha actualizado el proveedor
        */
        public static function updateDatosProveedor(Proveedor $proveedor): bool {
            $result = false;

            // Establecer conexión con la BBDD
            include_once '../Conexion/obtenerConexion.php';
            $conexion = ObtenerConexion::obtenerConexion();

            $sql = "UPDATE proveedor SET pwd = :pwd, nombre = :nombre, apellidos = :apellidos WHERE codigoProveedor = :codigoProveedor";
            $sentencia = $conexion->prepare($sql);

            $sentencia->bindValue(":pwd", $proveedor->getPwd());
            $sentencia->bindValue(":nombre", $proveedor->getNombre());
            $sentencia->bindValue(":apellidos", $proveedor->getApellidos());
            $sentencia->bindValue(":codigoProveedor", $proveedor->getCodigoProveedor());

            $result = $sentencia->execute();

            return $result;
        }

        /*
        Funcion para obtener un proveedor (con el array lleno de productos)
        Recibe: el codigo del proveedor
        Devuelve: un objeto que es un proveedor
        */
        public static function getProveedorCompleto(string $codigoProveedor): Proveedor {
            $productos = [];

            $proveedor = self::getProveedor($codigoProveedor);
            $productos = ProductoDB::getProducto($proveedor);
            $proveedor->setProductos($productos);

            return $proveedor;
        }
    }
?>