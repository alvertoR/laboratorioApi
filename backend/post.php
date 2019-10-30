<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

include 'apiempleados.php';
$empleado = new Apiempleados();

$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido']; 
$edad = $_POST['edad'];

if($nombre === '' || $apellido === '' || $edad === ''){
    echo json_encode('error');
}else{
    $empleado->newEmpleado($nombre,$apellido,$edad);
    echo json_encode('Usuario Registrado');
}


?>