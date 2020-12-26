<?php


    class Empleadores extends Model{

        // Retorna todos los empleadores //
        public function getTodos(){

            $this->db->query("SELECT * FROM empleadores");
            return $this->db->fetchAll();
        }

        // Busca si el empleador tiene registrado su perfil //
        public function buscar($idusuario){

            // Validaciones
            if (!ctype_digit($idusuario)) throw new ValidacionException('Error ID Usuario - Busqueda de Empleador');
            if ($idusuario < 1) throw new ValidacionException('Error ID Usuario - Busqueda de Empleador');

            $this->db->query("SELECT * FROM empleadores
                                WHERE id_usuario = $idusuario");
            return $this->db->fetch();
        }

        // Crea el empleador //
        public function crear($nom, $ape, $tel, $email, $idusuario){

            //Validaciones//

            if(strlen($nom) > 30 && strlen($ape) > 30 && strlen($email) > 50) 
            throw new ValidacionException('Error max caracteres - Creacion Empleador');
            
            $nom = $this->db->escape($nom);
            $nom = $this->db->escapeWildcards($nom);
            $ape = $this->db->escape($ape);
            $ape = $this->db->escapeWildcards($ape);
            $email = $this->db->escape($email);
            $email = $this->db->escapeWildcards($email);

            if (!ctype_digit($tel)) throw new ValidacionException('Error tel empleador - Creacion Empleado');
            if(strlen($tel) < 10 || strlen($tel) > 11) throw new ValidacionException('Error tel empleador - Creacion Empleado');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error idusuario empleador - Creacion Empleador');
            if ($idusuario < 0) throw new ValidacionException('Error idusuario empleador - Creacion Empleador');

            // Crea el perfil del empleador en la base de datos //
            $this->db->query("INSERT INTO empleadores
            (nombre, apellido, email, tel, id_usuario) VALUES 
            ('$nom', '$ape', '$email', $tel, $idusuario)");

        }

        public function modificar($nom, $ape, $tel, $email, $idusuario){

            //Validaciones//

            if(strlen($nom) > 30 && strlen($ape) > 30 && strlen($email) > 50) 
            throw new ValidacionException('Error max caracteres Nombre - Modificacion Empleador');
            
            $nom = $this->db->escape($nom);
            $nom = $this->db->escapeWildcards($nom);
            $ape = $this->db->escape($ape);
            $ape = $this->db->escapeWildcards($ape);
            $email = $this->db->escape($email);
            $email = $this->db->escapeWildcards($email);

            if (!ctype_digit($tel)) throw new ValidacionException('Error Tel Empleador - Modficacion Empleador');
            if ($tel < 0 && $tel < 11) throw new ValidacionException('Error Tel Empleador - Modificacion Empleador');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error ID Usuario de Empleador - Modificacion Empleador');
            if ($idusuario < 0) throw new ValidacionException('Error ID Usuario de Empleador - Modificacion Empleador');

            // Modifica el perfil del empleador en la base de datos //
            $this->db->query("UPDATE empleadores
                                SET nombre = '$nom', apellido = '$ape', email = '$email',
                                tel = $tel
                                WHERE id_usuario = $idusuario");
        }

        public function buscarContratado($idempleado,$idusuario){
            
            // Validaciones //
            if (!ctype_digit($idempleado)) throw new ValidacionException('Error Id Empleado - Buscar Contratado');
            if ($idempleado < 0) throw new ValidacionException('Error Id Empleado - Buscar Contratado');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error Id Usuario - Buscar Contratado');
            if ($idusuario < 0) throw new ValidacionException('Error Id Usuario - Buscar Contratado');

            $this->db->query("SELECT * FROM contratados
                                WHERE id_usuario = $idusuario AND id_empleado = $idempleado");
            
            return $this->db->fetch();

        }

        // Crea el contratado segun el id del empleado y el id del usuario del empleador //
        public function contratar($idempleado, $idusuario){

            // Validaciones //

            if (!ctype_digit($idempleado)) throw new ValidacionException('Error ID Empleado - Contratar empleado');
            if ($idempleado < 0) throw new ValidacionException('Error ID Empleado - Contratar empleado');

            if (!ctype_digit($idusuario)) throw new ValidacionException('Error ID Usuario - Contratar empleado');
            if ($idusuario < 0) throw new ValidacionException('Error ID Usuario - Contratar empleado');

            $this->db->query("INSERT INTO contratados
            (id_usuario, id_empleado) VALUES 
            ($idusuario, $idempleado)");
        }
        
    }

?>