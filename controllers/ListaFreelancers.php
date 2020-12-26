<?php

    require '../fw/fw.php';
    require '../views/ListaFreelancers.php';
    require '../views/PerfilElegido.php';
    require '../models/Empleados.php';
    require '../models/Empleadores.php';

    
    if(!isset($_SESSION['login']))
    {
        header('Location: login');
        exit;
    }  

    $usuario = $_SESSION['login'];

    if(isset($_SESSION['login']))
    {

        if($usuario['id_tipo'] == 2 )
        {
            header('location: login');
            exit;
        }
    }
    
    $me = new Empleadores();
    $mf = new Empleados();
  
    $empleador = $me->buscar($usuario['id_usuario']);

    if(isset($_POST['id_empleado'])){

        $idempleado = $_POST['id_empleado'];
        $fila = $mf->buscarIdempleado($idempleado);

        $v = new PerfilElegido();

        $v->empleado = $fila;
        $v->lenguajes = $mf->arrayLenguajes($idempleado);
        $v->ides = $mf->arrayIdes($idempleado);
        $v->exp = $mf->arrayExperiencia($idempleado);
        $v->empleador = $empleador;
    
    } else{

        if($empleador){
        
            $empleados = $mf->getTodos();
    
            $array = $mf->getLenguajes();

            $v = new ListaFreelancers();
            $v->empleados = $empleados;
            $v->lenguajes = $array;
            $v->empleador = $empleador;
    
        } else{
    
            header('Location: edicion-empleador');
            exit;
        }


    }

    $v->render();
?>