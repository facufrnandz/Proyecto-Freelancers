<!DOCTYPE html>
<html>
    
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <title>Perfil de Freelancer - Curriculum</title>

        <link href="style/EditarCv.css" rel="stylesheet">
    </head>
    
    <body>

        <div class="container-fluid" id="barra-superior">

            <div class="text-center" id="logo">
                <img class="mb-4 text-middle" src="img/FreeLancers-Logo.png" alt="" width="185" height="150">
            </div>

        </div>


        <section class="container rounded" id="datos"> 

            <form action="" method="POST">
                
                <label class="title" for="nombre">Lenguaje:</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="1" />Javascript</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="2" />Java</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="3" />C#</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="4" />C++</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="5" />PHP</label>
                <label><input class="len" type="checkbox" name="lenguaje[]"  value="6" />Phyton</label>

                <label class="title" for="nombre">IDE:</label>
                <label><input type="checkbox" name="ide[]"  value="1" />Visual Studio</label>
                <label><input type="checkbox" name="ide[]"  value="2" />NetBeans</label>
                <label><input type="checkbox" name="ide[]"  value="3" />Sublime Text</label>
                <label><input type="checkbox" name="ide[]"  value="4" />Eclipse</label>

                <label class="title" for="nombre">Experiencia:</label>
                <input class="container rounded" type="text" name="experiencia" id="experiencia" placeholder="Ingrese su experiencia aqui" autocomplete="off" style="WIDTH: 300px; HEIGHT: 40px"/>

                <label for="desde">Desde:</label>
                <input type="date" id="desde" name="desde" min="1940-01-01" max="2020-11-30">

                <label for="hasta">Hasta:</label>
                <input type="date" id="hasta" name="hasta" min="1940-01-01">

                <input class="btn btn-block text-white" type="submit" value="Modificar CV">
                
                <div class="container text-center" id="cancelar">
                    <a href="login">Cancelar</a>
                </div>

            </form>

        </section>
        
    </body>
    
</html>