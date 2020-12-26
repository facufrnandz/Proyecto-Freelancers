<?php

    require '../fw/fw.php';
    require '../models/Empleadores.php';
    require '../models/Empleados.php';
    require '../views/FreelancerContratado.php';


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

    $v = new FreelancerContratado();

    if(isset($_POST['id_empleado'])){

        $idempleado = $_POST['id_empleado'];
        $me = new Empleadores();
        $mf = new Empleados();

        $empleado = $mf->buscarIdempleado($idempleado);

        $fila = $me->buscarContratado($empleado['id_empleado'], $usuario['id_usuario']);

        if($fila){

            header('Location: lista-freelancers ');
            exit;
        }

        $me->contratar($empleado['id_empleado'],$usuario['id_usuario']);

        $v->empleado = $empleado;
        $v->render();

    }


?>

