<?php

    require '../fw/fw.php';
    require '../views/Perfil.php';
    require '../views/EdicionPerfil.php';
    require '../models/Empleados.php';

    if(!isset($_SESSION['login']))
    {
        header('Location: login');
        exit;
    }

    if(isset($_SESSION['login']))
    {
        $usuario = $_SESSION['login'];

        if($usuario['id_tipo'] == 1 )
        {
            header('location: login');
            exit;
        }
    }
    
    $e = new Empleados();
    $v = new EdicionPerfil();

    $usuario = $_SESSION['login'];
    $fila = $e->buscar($usuario['id_usuario']);

    if($fila){

        $idempleado = $fila['id_empleado'];

        $v = new Perfil();
        
        $v->empleado = $fila;
        $v->lenguajes = $e->arrayLenguajes($idempleado);
        $v->ides = $e->arrayIdes($idempleado);
        $v->exp = $e->arrayExperiencia($idempleado);

    } else {

        if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tel']) &&
        isset($_POST['email']) && isset($_POST['nacimiento'])){

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $nacimiento = $_POST['nacimiento'];
            $idusuario = $usuario['id_usuario'];

            $e->crear($nombre, $apellido, $tel,$email, $nacimiento,$idusuario);

            header("Location: home-empleado");
            exit;
        }
    }
    $v->render();
    
?>