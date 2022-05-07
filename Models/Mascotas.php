<?php

require "../Config/Conexion.php";

class Mascotas {
    
    public function obtenerMascotas(){
        $consulta = "SELECT idMascota, nombreMascota, tipoMascota, edadMascota, enfermedadesMascota, created_at, updated_at FROM mascota";
        return consulta($consulta); 
    }

   
    public function crearMascota($nombre,$tipo,$edad,$enfermedades){
        $dia = date('Y-m-d H:i:s');
        $consulta = "INSERT INTO mascota (nombreMascota,tipoMascota,edadMascota,enfermedadesMascota,created_at,updated_at) VALUES('$nombre', '$tipo', '$edad', '$enfermedades', '$dia', '$dia') ";

        $consulta2 = "SELECT idMascota, nombreMascota, tipoMascota, edadMascota, enfermedadesMascota, created_at, updated_at FROM mascota order by idMascota desc limit 1";
        return insertarConsulta($consulta,$consulta2);
    }

    public function editarMascota($id, $nombre,$tipo,$edad,$enfermedades){    
        $dia = date('Y-m-d H:i:s');   
        $consulta = "UPDATE  mascota SET nombreMascota='$nombre', tipoMascota='$tipo', edadMascota='$edad', enfermedadesMascota='$enfermedades', updated_at='$dia' WHERE idMascota = '$id'";
        
        $consulta2 = "SELECT idMascota, nombreMascota, tipoMascota, edadMascota, enfermedadesMascota, created_at, updated_at FROM mascota WHERE idMascota = '$id'";
        return insertarConsulta($consulta,$consulta2);
    }

    public function eliminarMascota($id){
        $consulta = "DELETE FROM  mascota WHERE idMascota = '$id'";
       
        $consulta2 = "SELECT idMascota, nombreMascota, tipoMascota, edadMascota, enfermedadesMascota, created_at, updated_at FROM mascota WHERE idMascota = '$id'";
        return insertarConsulta($consulta,$consulta2);
    }

}

?>