<?php

    require '../fw/fw.php';
    require '../models/Usuarios.php';
    require '../views/FormLogin.php';
    require '../views/ErrorLogin.php';

    $v = new FormLogin();

    if(isset($_SESSION['login']))
    {
        $usuario = $_SESSION['login'];

        if($usuario['id_tipo'] == 1 )
        {
            header('location: home-empleador');
            exit;
        }
        else
        {
            header('location: home-empleado');
            exit;
        }
    }
    
    //Login de usuario [Empleador - Freelance]
    if(isset($_POST['usuario']) && isset($_POST['password'])){
       
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $mu = new Usuarios();
        $fila = $mu->buscar($usuario, $password);
            
        if(!$fila){
            $v = new ErrorLogin();
        }else {
            $_SESSION['login'] = $fila;
            header('location: login');
            exit;
        }
    }
    $v->render();
?>
