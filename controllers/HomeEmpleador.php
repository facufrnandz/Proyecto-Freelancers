<?php

    require '../fw/fw.php';
    require '../views/EdicionPerfilEmpleador.php';
    require '../views/PerfilEmpleador.php';
    require '../models/Empleadores.php';

    if(!isset($_SESSION['login']))
    {
        header('Location: login');
        exit;
    }

    if(isset($_SESSION['login']))
    {
        $usuario = $_SESSION['login'];

        if($usuario['id_tipo'] == 2 )
        {
            header('location: login');
            exit;
        }
    }

    $v = new EdicionPerfilEmpleador();
    $e = new Empleadores();

    $usuario = $_SESSION['login'];
    $fila = $e->buscar($usuario['id_usuario']);

    if($fila){

        $v = new PerfilEmpleador();
        $v->empleador = $fila;

    } else {

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tel']) &&
        isset($_POST['email'])){

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $idusuario = $usuario['id_usuario'];

            $e->crear($nombre, $apellido, $tel,$email,$idusuario);

            header("Location: home-empleador");
            exit;
        }
    }
    $v->render();
    
?>
