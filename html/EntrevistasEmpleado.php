<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Empleador - Bienvenido <?= $this->empleado['nombre'] ?></title>

        <link href="style/EntrevistasEmpleado.css" rel="stylesheet">
    </head>
    
    <body class="text-left">

        <div class="container-fluid" id="barra-superior">

            <div class="text-center" id="logo">

                <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
            
            </div>

            <div class="text-center" id="barra-de-navegacion">

                <p class="texto-de-navegacion" id="focus">Entrevistas</p>
                <p class="texto-de-navegacion">|</p>
                <a href="home-empleador" class="texto-de-navegacion">Perfil</a>   
            
            </div>
        
        </div>

        <section class="text-right">
            
            <p class="cerrar-sesion">FreeLancer - </p>
            <p class="cerrar-sesion"> <?= $this->empleado['nombre'] ?> <?= $this->empleado['apellido'] ?> |</p>
            <a class="cerrar-sesion" href="cerrarsesion">Cerrar Sesión</a>
            
        </section>

        <h1 class="text-center">Futuras Entrevistas:</h1> 

        <section class="container rounded text-center" id="datos"> 

            <div class="text-center">

                <table class="table table-hover table-dark" id="tabla">

                    <thead class="thead-dark">
                    <tr><th>Nombre</th><th>Apellido</th><th>Email</th></tr>
                    </thead>

                    <?php foreach($this->contratadores as $c){ ?>
                        <tr><td><?= $c['nombre']?></td><td><?= $c['apellido']?></td><td><?= $c['email']?></td></tr>
                    <?php }?>

                </table>
                
                <a href="login">Volver</a>
            </div>
                
        </section>    

        

    </body>

</html>