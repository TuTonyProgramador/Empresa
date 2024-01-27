<?php
    include_once '../Modelo/proveedorDB.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

        // Obtencion datos formulario
        $codigoProveedor = $_POST['codigoProveedor'];
        $pwd = $_POST['pwd'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];

        $newProveedor = new Proveedor($codigoProveedor, $pwd, $nombre, $apellidos, $email);

        if (ProveedorDB::addProveedor($newProveedor)) {
            echo "<script>alert('El Proveedor ".$nombre." ha sido registrado en el sistema');</script>";
            echo "<script>window.location.href='../Vista/formLogin.php';</script>";
        } else {
            echo "<br> El proveedor no se ha podido registrar";
        }
    }
?>