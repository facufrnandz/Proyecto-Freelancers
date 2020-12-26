<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Empleador - Bienvenido <?= $this->empleador['nombre'] ?></title>

        <link href="style/EntrevistasEmpleador.css" rel="stylesheet">
    </head>
    
    <body class="text-left">

    <div class="container-fluid" id="barra-superior">

        <div class="text-center" id="logo">

            <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
        
        </div>

        <div class="text-center" id="barra-de-navegacion">

            <a href="entrevistas-empleador" class="texto-de-navegacion" id="focus">Entrevistas</a> 
            <p class="texto-de-navegacion">|</p>
            <a href="home-empleador" class="texto-de-navegacion">Perfil</a> 
            <p class="texto-de-navegacion">|</p>
            <a href="lista-freelancers" class="texto-de-navegacion">FreeLancers</a> 
            
        </div>

        <section class="text-right">

            <p class="cerrar-sesion">Empleador - </p>
            <p class="cerrar-sesion"> <?= $this->empleador['nombre'] ?> <?= $this->empleador['apellido'] ?> |</p>
            <a class="cerrar-sesion" href="cerrarsesion">Cerrar Sesión</a>
        
        </section>

        <section class="container rounded text-center" id="datos"> 

            <h2 class="font-weight-normal">Futuros Entrevistados</h2> 

                <div class="text-center">

                    <table class="table table-hover table-dark" id="tabla">

                        <thead class="thead-dark">

                            <tr><th>Nombre</th><th>Apellido</th><th>Nacimiento</th><th>Email</th><th>Telefono</th><th></th></tr>
                        
                        </thead>

                        <?php foreach($this->contratados as $c){ ?>
                                <?php foreach($this->empleados as $e){?> 
                                    
                                    <?php if($e['id_empleado'] == $c['id_empleado']){?>
                                    <tr><td><?= $e['nombre']?></td><td><?= $e['apellido']?></td><td><?= $e['fechanac']?></td><td><?= $e['email']?></td><td><?= $e['tel']?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_empleado" value="<?=$e['id_empleado']?>">
                                            <input type="submit" value="Ver mas">
                                        </form>
                                    </td></tr>
                                    <?php } ?>
                        <?php }}?>

                    </table>
                    
                </div>

        </section>    

    </body>
    
</html>