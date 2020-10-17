<?php
header("Content-Type:application/json");
//Rut.php?rut=20043248-7

$rut = $_GET['rut'];

if(!empty($rut)){
    $val = valida_rut($rut);
    if($val == true){
        deliver_response($rut,'Rut valido');
    }
    else{
        deliver_response($rut,'Rut Invalido');
    }
}
else{
    deliver_response('Por favor ingrese un rut');
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

function deliver_response($s_rut, $status){
    header("HTTP/1.1 $status");
    $response['Rut'] = $s_rut;
    $response['Estado'] = $status;

    $json_response = json_encode($response);
    echo $json_response;
}
?>