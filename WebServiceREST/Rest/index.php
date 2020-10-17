<?php 
header("Content-Type:application/json"); //tipo del documento
/**application/json es que este tipo de “servicios” utiliza protocolos para el envío y recepción de peticiones*/
//index.php?nombre=jennifer&apellidoP=PORTINO&apellidoM=FReDes&genero=F&rut=20043248-7

$nombre = $_GET['nombre'];
$apellidoP = $_GET['apellidoP'];
$apellidoM = $_GET['apellidoM'];
$genero = $_GET['genero'];
$rut = $_GET['rut'];

if(!empty($nombre)){
    if(!empty($apellidoP) && !empty($apellidoM)){
        $t = Nombre($nombre,$apellidoP,$apellidoM);
        if(!empty($genero)){
            if(!empty($rut)){
                $val = valida_rut($rut);
                if($genero == 'M'){
                    $G = 'Sr.';
                }
                elseif($genero == 'F'){
                    $G = 'Sra.';
                }
                else{
                    deliver_response(200,"Ingrese un valor valido",null,null);
                }
                if($val == true){
                    deliver_response(200,'Hola, '.$G.' '.$t,$rut,'Rut valido');
                }
                else{
                    deliver_response(200,'Hola, '.$G.' '.$t,$rut,'Rut Invalido');
                }
            }
            else{
                deliver_response(200,'Por favor ingrese un rut',null,null);
            }
        }
        else{
            deliver_response(200,"Por favor ingrese el genero",null,null);
        }
    }
    else{
        deliver_response(200,"Por favor ingrese los apelidos",null,null);
    }       
}
else{
    deliver_response(200,"Por favor, ingrese un nombre",null,null);
}

function deliver_response($status,$status_message,$R, $status_rut){
    header("HTTP/1.1 $status $status_message");
    $response['status'] = $status;
    $response['Mensaje'] = $status_message;
    $response['Rut'] = $R;
    $response['Estado'] = $status_rut;

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

function valida_rut($rut){
    if(strlen($rut) > 10 ){
        echo   'el Formato de rut ingresado (', $rut, ') es incorrecto, intentelo nuevamente.';    
        return false;
    }
    if(strlen($rut) < 9 ){
        echo   'el Formato de rut ingresado (', $rut, ') es incorrecto, intentelo nuevamente.';
        return false;
    }
    if(strpos($rut, '-') == false){
        echo   'el Formato de rut ingresado (', $rut, ') es incorrecto, intentelo nuevamente.';
        return false;
    }

    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;

        $suma += $v * $i;
        ++$i;
    }

    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';

    if($dvr == strtoupper($dv))
        return true;
    else      
        return false;
    
}
?>