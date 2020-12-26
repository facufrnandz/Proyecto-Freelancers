<?php

    require '../fw/fw.php';
    require '../views/EdicionCv.php';
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

    $v = new EdicionCv();
    $e = new Empleados();

    $usuario = $_SESSION['login'];
    $fila = $e->buscar($usuario['id_usuario']);

    if(!$fila){

        header("Location: home-empleado");
        exit;

    } 
    
    if(count($_POST) > 0){

        $arrayLenguajes = $_POST['lenguaje'];
        $arrayIdes = $_POST['ide'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $idempleado = $fila['id_empleado'];
        $experiencia = $_POST['experiencia'];

        $e->modificarCv($arrayLenguajes, $arrayIdes, $desde, $hasta, $idempleado, $experiencia);

        header("Location: home-empleado");
        exit;
    }
    $v->render();

    ?>