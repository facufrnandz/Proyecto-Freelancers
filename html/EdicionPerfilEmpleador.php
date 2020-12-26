<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Empleador - Registro de datos</title>

        <link href="style/EditarPerfil2.css" rel="stylesheet">
    </head>
    
    <body>

        <div class="container-fluid" id="barra-superior">

            <div class="text-center" id="logo">
                <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
            </div>

        </div>

        <section class="container rounded" id="datos"> 

            <form action="" method="POST">

                <label for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre" id="nombre"/>

                <label for="apellido">Apellido:</label>
                <input class="form-control" type="text" name="apellido" id="apellido"/>

                <label for="email">Email:</label>
                <input class="form-control" type="text" name="email" id="email"/>
                
                
                <label for="tel">Telefono:</label>
                <input class="form-control" type="text" name="tel" id="tel"/>

                <input class="btn btn-block text-white" type="submit" value="Crear Perfil">
                
            </form>
        
            <div class="container text-center" id="cancelar">
                <a href="login">Cancelar</a>
            </div>

        </section>

    </body>
    
</html>