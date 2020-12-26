<?php

    class TipoUsuarios extends Model{

        public function getTipos(){
            
            $this->db->query("SELECT * FROM tipousuarios ");

            return $this->db->fetchAll();
        }
    }

?>