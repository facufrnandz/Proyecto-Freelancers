<?php

    require '../fw/fw.php';
    require '../models/TipoUsuarios.php';
    require '../models/Usuarios.php';
    require '../views/FormLogin.php';
    require '../views/FormRegister.php';

    $v = new FormRegister();
    $mtu = new TipoUsuarios();
    $v->tipousuarios = $mtu->getTipos();

    if(isset($_SESSION['login']))
    {
        header('Location: login');
        exit;
    }

    //Registro de usuario
    if (!empty($_POST['usuarioReg']) && !empty($_POST['passwordReg']) && !empty($_POST['tipousuariosReg'])){
        
        $usuario = $_POST['usuarioReg'];
        $password = $_POST['passwordReg'];
        $tipo = $_POST['tipousuariosReg'];

        $u = new Usuarios();
        $fila = $u->buscarUsuario($usuario);


        if (!$fila){
            //Si no hay coincidencia de usuario se crea//
            $u->crearUsuario($usuario, $password, $tipo);
            header('Location: login.php');
            exit;
        }else{

            //Usuario existente//
            $v->render();
        }

    } else{

        //No se escribieron los datos en el form//
        $v->render();
    }

?>