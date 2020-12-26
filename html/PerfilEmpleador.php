<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Empleador - Bienvenido <?= $this->empleador['nombre'] ?></title>

        <link href="style/Perfil2.css" rel="stylesheet">
    </head>
    
    <body class="text-left">

    <div class="container-fluid" id="barra-superior">

        <div class="text-center" id="logo">
            <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
        </div>

        <div class="text-center" id="barra-de-navegacion">

            <a href="entrevistas-empleador" class="texto-de-navegacion">Entrevistas</a> 
            <p class="texto-de-navegacion">|</p>
            <p class="texto-de-navegacion" id="focus">Perfil</p>
            <p class="texto-de-navegacion">|</p>
            <a href="lista-freelancers" class="texto-de-navegacion">FreeLancers</a> 
            
        </div>

        <section class="text-right">

            <p id="tipo">Empleador - </p>
            <p class="cerrar-sesion"> <?= $this->empleador['nombre'] ?> <?= $this->empleador['apellido'] ?> |</p>
            <a class="cerrar-sesion" href="cerrarsesion">Cerrar Sesión</a>
            
        </section>

        <h1 class="text-center">Datos Personales:</h1>

        <section class="container rounded text-center" id="datos"> 

            <h2>Nombre:</h2> 
            <p><?= $this->empleador['nombre'] ?></p>

            <h2>Apellido:</h2> 
            <p><?= $this->empleador['apellido'] ?></p>

            <h2>Email:</h2> 
            <p><?= $this->empleador['email'] ?></p>

            <h2>Telefono:</h2> 
            <p><?= $this->empleador['tel'] ?></p>

            <section>
            <a href= "edicion-empleador">Editar Perfil</a>
            </section>

        </section>



    </body>
</html>