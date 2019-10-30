<?php

include_once 'conexion.php';

class Empleado extends Conexion{
    
    function obtenerEmpleados(){
    
        $query = $this->connect()->query('select*from empleados');
        
        return $query;    
    }

    function getEmpleado($id){
        $query = $this->connect()->prepare('select*from empleados where id= :id');
        $query->execute([':id' => $id]);

        return $query;
    }

    function deleteEmpleado($id){
        $query = $this->connect()->prepare('delete from empleados where id= :id');
        $query->execute([':id' => $id]);
        return $query;
    }

    function insertEmpleado($nombre,$apellido,$edad){
        $query = $this->connect()->prepare('insert into empleados(nombre,apellido,edad) values(:nombre,:apellido,:edad)');
        $query->execute([':nombre'=>$nombre,':apellido'=>$apellido,':edad'=>$edad]);
        return $query;
    }
}

?>