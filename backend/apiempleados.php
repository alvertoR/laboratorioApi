<?php


include_once 'empleado.php';

class Apiempleados{
    

    function getAll(){
        $empleado = new Empleado();

        $res = $empleado->obtenerEmpleados();

        if($res->rowCount()){

            $datos = $res->fetchAll();

            return $datos;

        }else{
        
            $this->error('Tabla desconocido');
            
        }
    }

    function getById($id){
        $empleado = new Empleado();

        $res = $empleado->getEmpleado($id);

        if($res->rowCount()){

            $datos = $res->fetchAll();

            return $datos;

        }else{
        
            $this->error('Usuario no Encontrado');
            
        }
    }

    function deleteById($id){
        $empleado = new Empleado();

        $empleado->deleteEmpleado($id);

    }

    function newEmpleado($nombre,$apellido,$edad){
        $empleado = new Empleado();
        $empleado->insertEmpleado($nombre,$apellido,$edad);
    }

  
    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
    }

}


?>