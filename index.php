<?php
//Ejemplo de web service, calcula el imc
header("Content-Type:application/json"); //tipo del documento
/**application/json es que este tipo de “servicios” utiliza protocolos para el envío y recepción de peticiones*/

$nombre = $_GET['nombre'];
if(!empty($nombre)){
    $peso = $_GET['peso'];
    $estatura = $_GET['estatura'];

    if(!empty($peso) && !empty($estatura)){ //Calculo del imc 
        $estatura /= 100;
        $imc = $peso / ($estatura * $estatura);
        $imc = round($imc, 2);
        deliver_response(200, "$nombre tu IMC es de $imc", $imc);
    }
    else{ // Si el peso o estatura esta vacio 
        deliver_response(200, "peso o estatura no validos", null);
    }       
}
else{ //Si el campo de nombre esta vacio
    deliver_response(200, "Nombre no valido", null);
}

function deliver_response($status, $status_message, $data){ //Funcion que manda los mensajes de error
    header("HTTP/1.1 $status $status_message");
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}

?>