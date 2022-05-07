<?php

require "../Config/Conexion.php";


class TiposMascotas {
    
    public function obtenerTipos(){
        $consulta = "SELECT idTipo, nombreTipo FROM tipomascota";
        return consulta($consulta); 
    }

   
    public function crearTipo($nombre){
        $consulta = "INSERT INTO tipomascota (nombreTipo) VALUES('$nombre') ";

        $consulta2 = "SELECT idTipo, nombreTipo FROM tipomascota order by idTipo desc limit 1";
        return insertarConsulta($consulta,$consulta2);
    }

    public function editarTipo($id,$nombre){        
        $consulta = "UPDATE  tipomascota SET nombreTipo='$nombre' WHERE idTipo = '$id'";
        
        $consulta2 = "SELECT idTipo, nombreTipo FROM tipomascota WHERE idTipo = '$id'";
        return insertarConsulta($consulta,$consulta2);
    }

    public function eliminarTipo($id){
        $consulta = "DELETE FROM  tipomascota WHERE idTipo = '$id'";
       
        $consulta2 = "SELECT idTipo, nombreTipo FROM tipomascota WHERE idTipo = '$id'";
        return insertarConsulta($consulta,$consulta2);
    }

}

?>