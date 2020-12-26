<?php

    require '../fw/fw.php';
    require '../views/EntrevistasEmpleador.php';
    require '../views/PerfilEntrevistado.php';
    require '../models/Empleadores.php';
    require '../models/Contratados.php';
    require '../models/Empleados.php';


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

    $usuario = $_SESSION['login'];

    $v = new EntrevistasEmpleador();
    $me = new Empleadores();
    $mf = new Empleados();
    $mc = new Contratados();

    $empleador = $me->buscar($usuario['id_usuario']);

    if(isset($_POST['id_empleado'])){

        $idempleado = $_POST['id_empleado'];
        $fila = $mf->buscarIdempleado($idempleado);

        $v = new PerfilEntrevistado();

        $v->empleado = $fila;
        $v->lenguajes = $mf->arrayLenguajes($idempleado);
        $v->ides = $mf->arrayIdes($idempleado);
        $v->exp = $mf->arrayExperiencia($idempleado);
        $v->empleador = $empleador;
    
    }

    if($empleador){

        $contratados = $mc->getTodos();
        $empleados = $mf->getTodos();
        $array = array();

        foreach($contratados as $c){

            if ($c['id_usuario'] == $usuario['id_usuario']){

                array_push($array , $c);
            }
        }

        $v->empleados = $empleados;
        $v->contratados = $array;
        $v->empleador = $empleador;
        $v->render();


    } else {
        header('Location: entrevistas-empleador');
        exit;
    }








?>