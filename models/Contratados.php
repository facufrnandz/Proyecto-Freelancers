<?php

    class Contratados extends Model{

        public function getTodos(){

            $this->db->query("SELECT * FROM contratados");

            return $this->db->fetchall();

        }

        public function getContratadores($idempleado){

            if (!ctype_digit($idempleado)) throw new ValidacionException('Error Contratadores - Entrevistas del Empleado');
            if ($idempleado < 1) throw new ValidacionException('Error Contratadores - Entrevistas del Empleado');

            $this->db->query("SELECT nombre, apellido, email FROM contratados c 
                                LEFT JOIN empleadores e ON e.id_usuario = c.id_usuario 
                                WHERE c.id_empleado = $idempleado");
            
            return $this->db->fetchall();
        }

    }  
?>