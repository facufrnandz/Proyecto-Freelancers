<?php

    require '../fw/fw.php';
    require '../views/EntrevistasEmpleado.php';
    require '../models/Empleados.php';
    require '../models/Contratados.php';

    if(!isset($_SESSION['login'])){
        header('Location: login');
        exit;
    }

    if(isset($_SESSION['login'])) {
        $usuario = $_SESSION['login'];

        if($usuario['id_tipo'] == 1 )
        {
            header('location: login');
            exit;
        }
    }

    $v = new EntrevistasEmpleado();
    $mf = new Empleados();
    $mc = new Contratados();

    $usuario = $_SESSION['login'];
    $empleado = $mf->buscar($usuario['id_usuario']);

    if($empleado){

        $contratadores = $mc->getContratadores($empleado['id_empleado']);
        
        $v->empleado = $empleado;
        $v->contratadores = $contratadores;

    } else {

        header('Location: edicion-freelancer');
        exit;

    }

    $v->render();

?>