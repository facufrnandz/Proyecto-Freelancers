<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Freelancer - Bienvenido <?= $this->empleado['nombre'] ?></title>

        <link href="style/Contratado.css" rel="stylesheet">
    </head>
    
    <body class="text-left">

        <div class="container-fluid" id="barra-superior">

            <div class="text-center" id="logo">

                <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
            
            </div>

            <div class="text-center" id="barra-de-navegacion">

                <a href="entrevistas-empleador" class="texto-de-navegacion">Entrevistas</a> 
                <p class="texto-de-navegacion">|</p>
                <a href="login" class="texto-de-navegacion">Perfil</a> 
                <p class="texto-de-navegacion">|</p>
                <a href="lista-freelancers" class="texto-de-navegacion">Freelancers</a> 
            
            </div>

        </div>
        
        <section class="text-right">

            <p class="cerrar-sesion"> <?= $this->empleado['nombre'] ?> <?= $this->empleado['apellido'] ?> |</p>
            <a class="cerrar-sesion" href="cerrarsesion">Cerrar Sesión</a>

        </section>

        <section class="container rounded" id="datos"> 

            <h2 class="font-weight-normal">Has contratado a <?=$this->empleado['nombre']?> <?= $this->empleado['apellido']?> !</h2> 

            <section class="text-center">

                <a href="lista-freelancers">Volver</a>
                <p> | </p>
                <a href="entrevistas-empleador">Ver entrevistas</a>
                
            </section>

        </section>    

    </body>
</html>