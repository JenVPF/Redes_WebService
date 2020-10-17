<?php
header("Content-Type:application/json"); //tipo del documento
/**application/json es que este tipo de “servicios” utiliza protocolos para el envío y recepción de peticiones*/
//Nombre.php?nombre=jennifer&apellidoP=PORTINO&apellidoM=FReDes&genero=F

$nombre = $_GET['nombre'];
$apellidoP = $_GET['apellidoP'];
$apellidoM = $_GET['apellidoM'];
$genero = $_GET['genero'];

if(!empty($nombre)){
    if(!empty($apellidoP) && !empty($apellidoM)){

        $t = Nombre($nombre,$apellidoP,$apellidoM);

        if(!empty($genero)){
            if($genero == 'M'){
                $G = 'Sr.';
            }
            elseif($genero == 'F'){
                $G = 'Sra.';
            }
            else{
                deliver_response("Ingrese un valor valido");
            }
            $Msj = 'Hola, '.$G.' '.$t;
            deliver_response($Msj);
        }

        else{
            deliver_response("Por favor ingrese el genero");
        }

    }

    else{
        deliver_response("Por favor ingrese los apelidos");
    }       
}

else{
    deliver_response("Por favor, ingrese un nombre");
}

function deliver_response($status_message){
    header("HTTP/1.1 $status_message");
    $response['Mensaje'] = $status_message;

    $json_response = json_encode($response);
    echo $json_response;
}

function Nombre($n,$ap,$am){ //Tranformacion de formato
    //Para Mayuscula $str = strtoupper($str);
    $nom = strtoupper($n[0]);
    $aap = strtoupper($ap[0]);
    $aam = strtoupper($am[0]);
    for($i = 1 ; $i < strlen($n); $i++){
        $nom = $nom.strtolower($n[$i]);
    }
    for($i = 1 ; $i < strlen($ap); $i++){
        $aap = $aap.strtolower($ap[$i]);
    }
    for($i = 1 ; $i < strlen($am); $i++){
        $aam = $aam.strtolower($am[$i]);
    }
    $texto = $nom.' '.$aap.' '.$aam;
    return $texto;
}
?>