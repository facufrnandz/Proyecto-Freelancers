<?php

    class Usuarios extends Model{

        public function buscar($user,$pass){

            //Validaciones//

            if(strlen($user) > 30 && strlen($pass) > 30) throw new ValidacionException('Error max caracteres - Login de usuario');
            
            $user = $this->db->escape($user);
            $user = $this->db->escapeWildcards($user);
            $pass = $this->db->escape($pass);
            $pass = $this->db->escapeWildcards($pass);

            // Busca el usuario y contraseña en la base // 
            $pass = sha1($pass);

            $this->db->query("SELECT * 
                                FROM usuarios
                                WHERE nombre = '$user' AND password = '$pass'");
            return $this->db->fetch();
        }

        public function buscarUsuario($user){

            //Validaciones//

            if(strlen($user) > 30) 
            throw new ValidacionException('Error max caracteres - Busqueda de usuario');
            
            $user = $this->db->escape($user);
            $user = $this->db->escapeWildcards($user);

            // Busca el usuario en la base de datos// 
            $this->db->query("SELECT * 
                                FROM usuarios
                                WHERE nombre = '$user'");
            return $this->db->fetch();
        }

        public function crearUsuario($user, $pass, $tipo){

            //Validaciones//

            if(strlen($user) > 30 && strlen($pass) > 30) 
            throw new ValidacionException('Error max caracteres - Login de usuario');
            
            $user = $this->db->escape($user);
            $user = $this->db->escapeWildcards($user);
            $pass = $this->db->escape($pass);
            $pass = $this->db->escapeWildcards($pass);

            if (!ctype_digit($tipo)) throw new ValidacionException('Error tipo usuario - Busqueda de usuario');
            if ($tipo <= 0) throw new ValidacionException('Error tipo usuario - Busqueda de usuario');
            
            // Inserta el nuevo usuario en la base de datos //
            
            $pass = sha1($pass);

            $this->db->query("INSERT INTO usuarios
                                (nombre, password, id_tipo) VALUES 
                                ('$user', '$pass', $tipo)");
        }

    }


?>

