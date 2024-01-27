<?php
    session_start();
    
    include_once '../Modelo/proveedorDB.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Obtencion datos formulario
        $codigoProveedor = $_POST['codigoProveedor'];
        $pwd = $_POST['pwd'];

        $proveedor = ProveedorDB::getProveedor($codigoProveedor);

        $contraProveedor = $proveedor->getPwd();

        if ($proveedor && password_verify($pwd, $contraProveedor)) {
            $_SESSION['codigoProveedor'] = $proveedor->getCodigoProveedor();

            echo "<script>alert('Proveedor Logueado Correctamente');</script>";
            echo "<script>window.location.href='../Vista/formMostrarProductos.php';</script>";
        } else {
            echo "<br> El proveedor no existe en la BBDD o la contraseña es incorrecta.";
        }
    }
?>