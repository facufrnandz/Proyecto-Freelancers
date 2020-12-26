<!DOCTYPE html>
<html>
    
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Freelancer - <?= $this->empleado['nombre'] ?></title>

        <link href="style/PerfilElegido.css" rel="stylesheet">
    </head>
    
    <body class="text-left">

        <div class="container-fluid" id="barra-superior">

            <div class="text-center" id="logo">
                <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
            </div>

            <div class="text-center" id="barra-de-navegacion">
            <a href="entrevistas-empleador" class="texto-de-navegacion">Entrevistas</a> 
            <p class="texto-de-navegacion">|</p>
            <a href="home-empleador" class="texto-de-navegacion">Perfil</a> 
            <p class="texto-de-navegacion">|</p>
            <a href="lista-freelancers" class="texto-de-navegacion">FreeLancers</a> 
            
        </div>

        </div>
        
        <section class="text-right">

            <p id="tipo">Empleador - </p>
            <p class="cerrar-sesion"> <?= $this->empleador['nombre'] ?> <?= $this->empleador['apellido'] ?> |</p>
            <a class="cerrar-sesion" href="CerrarSesion.php">Cerrar Sesión</a>

        </section>

        <h1 class="text-center">Datos Personales:</h1>

        <section class="container rounded text-center" id="datos"> 

            <h2 class="font-weight-normal">Nombre:</h2> 
            <p><?= $this->empleado['nombre'] ?>.</p>

            <h2 class="font-weight-normal">Apellido:</h2> 
            <p><?= $this->empleado['apellido'] ?>.</p>

            <h2 class="font-weight-normal">Fecha de Nacimiento:</h2> 
            <p><?= $this->empleado['fechanac'] ?>.</p>

            <h2 class="font-weight-normal">Email:</h2> 
            <p><?= $this->empleado['email'] ?>.</p>

            <h2 class="font-weight-normal">Telefono:</h2> 
            <p><?= $this->empleado['tel'] ?>.</p>

        </section>    

        <h1 class="text-center">Curriculum:</h1>

        <section class="container rounded text-center" id="datos"> 

            <h2 class="font-weight-normal">Lenguajes</h2> 

            <?php foreach($this->lenguajes as $l){ ?>
                        <p> | <?= $l['nombreleng']?></p>
            <?php }?>
            <p>|</p>

            <h2 class="font-weight-normal">Ides</h2> 

            <?php foreach($this->ides as $i){ ?>
                        <p> | <?= $i['nombreide']?></p>
            <?php }?>
            <p>|</p>

            <h2 class="font-weight-normal">Experiencia</h2> 

            <div class="container-fluid" >

                <table class="table table-hover table-dark" id="tabla">

                    <thead class="thead-dark">
                        <tr><th>Desde</th><th>Hasta</th><th>Experiencia</th></tr>
                    </thead>
                    
                    <?php foreach($this->exp as $i){ ?>
                                <tr><td><?= $i['fechadesde']?></td><td><?= $i['fechahasta']?></td><td><?= $i['descripcion']?></td></tr>
                    <?php }?>

                </table>

            </div>

        </section>    

        <div class="container-fluid text-center" id="seleccion">

            <form action="contratar" method="POST">
                <input type="hidden" name="id_empleado" value="<?=$this->empleado['id_empleado']?>">
                <input type="submit" value="Contratar">
            </form>

            <a href="lista-freelancers">Volver</a>

        </div>

    </body>
    
</html>