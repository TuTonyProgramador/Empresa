<?php
    session_start();

    include_once '../Modelo/proveedorDB.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

        // Obtencion datos formulario
        $codigoProveedor = $_SESSION['codigoProveedor'];
        $pwd = $_POST['pwdM'];
        $nombre = $_POST['nombreM'];
        $apellidos = $_POST['apellidosM'];
        $email = $_POST['emailM'];

        $updateProveedor = new Proveedor($codigoProveedor, $pwd, $nombre, $apellidos, $email);

        if (ProveedorDB::updateDatosProveedor($updateProveedor)) {
            echo "<script>alert('El Proveedor ha sido actualizado correctamente');</script>";
            echo "<script>window.location.href='../Vista/formUpdateProveedor.php';</script>";
        } else {
            echo "<br> El proveedor no se ha podido modificar";
        }
    }
?>