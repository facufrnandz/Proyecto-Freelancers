<?php

    class Empleados extends Model{

        // Retorna todos los freelancers //
        public function getTodos(){

            $this->db->query("SELECT * FROM empleados");
            return $this->db->fetchAll();
        }

        // Busca si el freelancers tiene registrado su perfil //
        public function buscar($idusuario){

            // Validaciones //
            if (!ctype_digit($idusuario)) throw new ValidacionException('Error ID Usuario - Busqueda de Empleado');
            if ($idusuario < 1) throw new ValidacionException('Error ID Usuario - Busqueda de Empleado');

            $this->db->query("SELECT * FROM empleados
                                WHERE id_usuario = $idusuario");
            return $this->db->fetch();
        }

        public function buscarIdempleado($idempleado){
            
            // Validaciones //
            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Busqueda de Empleador');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Busqueda de Empleador');
            

            $this->db->query("SELECT * FROM empleados
            WHERE id_empleado = $idempleado");
            return $this->db->fetch();

        }

        // Crea el freelancer //
        public function crear($nom, $ape, $tel, $email, $nac, $idusuario){

            //Validaciones//

            if(strlen($nom) > 30 && strlen($ape) > 30 && strlen($email) > 50) 
            throw new ValidacionException('Error max caracteres - Creacion Empleado');
            
            $nom = $this->db->escape($nom);
            $nom = $this->db->escapeWildcards($nom);
            $ape = $this->db->escape($ape);
            $ape = $this->db->escapeWildcards($ape);
            $email = $this->db->escape($email);
            $email = $this->db->escapeWildcards($email);
            $nac = $this->db->escape($nac);
            $nac = $this->db->escapeWildcards($nac);

            if (!ctype_digit($tel)) throw new ValidacionException('Error tel empleado - Creacion Empleado');
            if ($tel < 0 && $tel < 11) throw new ValidacionException('Error tel empleado - Creacion Empleado');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error idusuario empleado - Creacion Empleado');
            if ($idusuario < 0) throw new ValidacionException('Error idusuario empleado - Creacion Empleado');

            // Crea el perfil del empleado en la base de datos //
            $this->db->query("INSERT INTO empleados
            (nombre, apellido, fechanac, email, tel, id_usuario) VALUES 
            ('$nom', '$ape', '$nac', '$email', $tel, $idusuario)");

        }

        public function modificar($nom, $ape, $tel, $email, $nac, $idusuario){

            //Validaciones//

            if(strlen($nom) > 30 && strlen($ape) > 30 && strlen($email) > 50) 
            throw new ValidacionException('Error max caracteres - Modificacion Empleado');
            
            $nom = $this->db->escape($nom);
            $nom = $this->db->escapeWildcards($nom);
            $ape = $this->db->escape($ape);
            $ape = $this->db->escapeWildcards($ape);
            $email = $this->db->escape($email);
            $email = $this->db->escapeWildcards($email);
            $nac = $this->db->escape($nac);
            $nac = $this->db->escapeWildcards($nac);

            if (!ctype_digit($tel)) throw new ValidacionException('Error tel empleado - Modficacion Empleado');
            if ($tel < 0 && $tel < 11) throw new ValidacionException('Error tel empleado - Modificacion Empleado');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error idusuario empleado - Modificacion Empleado');
            if ($idusuario < 0) throw new ValidacionException('Error idusuario empleado - Modificacion Empleado');

            // Modifica el perfil del empleado en la base de datos //
            $this->db->query("UPDATE empleados 
                                SET nombre = '$nom', apellido = '$ape', fechanac = '$nac', email = '$email',
                                tel = $tel
                                WHERE id_usuario = $idusuario");
        }

        // Busca si el freelancer tiene un lenguaje especifico //
        public function buscarLenguaje($idempleado, $idlenguaje){

            // Validaciones // 

            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Busqueda de Lenguaje');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Busqueda de Lenguaje');

            if (!ctype_digit($idlenguaje)) throw new ValidacionException('Error ID Empleado - Busqueda de Lenguaje');
            if ($idlenguaje < 1) throw new ValidacionException('Error ID Empleado - Busqueda de Lenguaje');

            $this->db->query("SELECT * FROM empleadosleng
                                WHERE id_empleado = $idempleado AND id_lenguaje = $idlenguaje");
            return $this->db->fetch();
        }

        // Busca si el freelancer tiene un id especifico //
        public function buscarIde($idempleado, $idide){

            // Validaciones //

            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Busqueda de Ide');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Busqueda de Ide');

            if (!ctype_digit($idide)) throw new ValidacionException('Error ID Empleado - Busqueda de Ide');
            if ($idide < 1) throw new ValidacionException('Error ID Empleado - Busqueda de Ide');

            $this->db->query("SELECT * FROM empleadoside
                                WHERE id_empleado = $idempleado AND id_ide = $idide");
            return $this->db->fetch();
        }

        public function modificarCv($arraylenguajes, $arrayides,$desde, $hasta, $idempleado,$experiencia){
            
            // Validaciones //

            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Modificacion CV');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Modificacion CV');

            $desde = $this->db->escape($desde);
            $desde = $this->db->escapeWildcards($desde);

            $hasta = $this->db->escape($hasta);
            $hasta = $this->db->escapeWildcards($hasta);
            
            // Inserta los lenguajes seleccionados a la base de datos // 
            $e = new Empleados();

            $this->db->query("SELECT * FROM lenguajes");
            $lengtotales = $this->db->numRows();

            foreach($arraylenguajes as $idleng){

                if (!ctype_digit($idleng)) throw new ValidacionException('Error lenguaje  - Modficacion CV');
                if ($idleng < 1 || $idleng > $lengtotales ) throw new ValidacionException('Error lenguaje - Modificacion CV');

                $encontrado = $e->buscarLenguaje($idempleado, $idleng);

                if (!$encontrado){

                    $this->db->query("INSERT INTO empleadosleng
                        (id_empleado, id_lenguaje) VALUES 
                        ($idempleado, $idleng)");

                }
            }

            // Inserta los Ides seleccionados a la base de datos // 
            $this->db->query("SELECT * FROM ides");
            $idestotales = $this->db->numRows();

            foreach($arrayides as $idide){

                if (!ctype_digit($idide)) throw new ValidacionException('Error ide  - Modficacion CV');
                if ($idide < 1 && $idide > $idestotales ) throw new ValidacionException('Error ide - Modificacion CV');

                $encontrado = $e->buscarIde($idempleado, $idide);

                if (!$encontrado){

                    $this->db->query("INSERT INTO empleadoside
                        (id_empleado, id_ide) VALUES 
                        ($idempleado, $idide)");

                }
            }

            // Validacion Experiencia e insert //

            if(strlen($experiencia) > 150 ) throw new ValidacionException('Error max caracteres - Modificacion CV');
            
            $nom = $this->db->escape($experiencia);
            $nom = $this->db->escapeWildcards($experiencia);

            if(!empty($experiencia)){

                $this->db->query("INSERT INTO experiencia
                            (id_empleado, fechadesde, fechahasta, descripcion) VALUES 
                            ($idempleado, '$desde', '$hasta', '$experiencia')");

            } 

        }

        //Envia los lenguajes del freelancer al controlador//
        public function arrayLenguajes($idempleado){

            // Validacion // 
            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Array Lenguajes');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Array Lenguajes');

            $this->db->query("SELECT nombreleng FROM empleadosleng e 
                                LEFT JOIN lenguajes l ON e.id_lenguaje = l.id_lenguaje 
                                WHERE e.id_empleado = $idempleado");

            
            return $this->db->fetchall();

        }

        //Envia los ides del freelancer al controlador//
        public function arrayIdes($idempleado){
            
            // Validacion // 
            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Array Ides');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Array Ides');

            $this->db->query("SELECT nombreide FROM empleadoside e 
                                LEFT JOIN ides i ON e.id_ide = i.id_ide
                                WHERE e.id_empleado = $idempleado");

            
            return $this->db->fetchall();

        }

        //Envia la informacion de la experiencia del freelancer al controlador//
        public function arrayExperiencia($idempleado){

            // Validacion // 
            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Array Experiencia');
            if ($idempleado < 1) throw new ValidacionException('Error ID Empleado - Array Experiencia');

            $this->db->query("SELECT fechadesde, fechahasta, descripcion 
                                FROM `experiencia` 
                                WHERE id_empleado = $idempleado
                                ORDER BY fechadesde asc ");

            return $this->db->fetchall();
        }

        //Envia todos los lenguajes con los id de los empleados //
        public function getLenguajes(){

            $this->db->query("SELECT * FROM empleadosleng e
                                LEFT JOIN lenguajes l ON e.id_lenguaje = l.id_lenguaje ");

            return $this->db->fetchall();

        }
        
    }

?>

