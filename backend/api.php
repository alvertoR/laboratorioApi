<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include 'apiempleados.php';

$empleado = new Apiempleados();

$peticion = $_GET['variable'];

if(is_numeric($peticion)){
    

    $valor = $empleado->getById($peticion);

    echo json_encode($valor);

}else if($peticion == 'empleados'){
   $valor = $empleado->getAll();

   echo json_encode($valor);
}

$apoyo = explode(";",$peticion);



if($apoyo[0] == 'eliminar'){
    
    $id = $apoyo[1];   
    $empleado->deleteById($id);
}

?>