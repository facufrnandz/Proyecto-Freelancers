<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        

        <title>Register</title>

        <link href="style/Register.css" rel="stylesheet">
    </head>
    
    <body class="text-center">

        <div class="container rounded">

            <form class="form-signin" action="" method="POST">

                <img class="mb-4" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">

                <input class="form-control" type="text" name="usuarioReg" id="usuarioReg" placeholder="Usuario"/>

                <input  class="form-control"type="text" name="passwordReg" id="passwordReg" placeholder="Contraseña"/>
                       
                <select class="custom-select" name="tipousuariosReg" id="tipousuariosReg">

                    <option value="0">-Objetivo-</option>
                    <?php foreach($this->tipousuarios as $u){ ?>
                        <option value="<?=$u['id_tipo']?>"><?=$u['descripcion']?></option>
                    <?php }?>

                </select>
                    
                <input class="btn btn-block text-white" type="submit" value="Registrarse"/>  
                           
            </form>

            <div class="container">

                <p class="text-white">¿Ya Estas Registrado?</p>
                <a href="login" class="text-white">¡Inicia Sesión Aquí!</a>
                
            </div>

        </div>

    </body>

</html>