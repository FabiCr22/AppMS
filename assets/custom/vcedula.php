<?php
/**
* Validador Cédula y RUC ecuatorianos
* Autor: Erick Cruz
* Sitio Web: https://github.com/ecruz22
* Copyright © Macro Show 2020
*/
require_once('Controllers/ValidarIdentificacion.php');
$numero = $_POST['CiRuc_User'];

$validador = new ValidarIdentificacion();   // Crear nuevo objeto de validación

if ($validador->validarCedula($numero)) {  // validar CI
    $datos = array('estado' =>'OK');
    echo  json_encode($datos, true);
    //echo 'Cédula válida';
} else {
    if ($validador->validarRucPersonaNatural($numero)) {    // validar RUC persona natural
        $datos = array('estado' =>'OK');
        echo  json_encode($datos, true);
        //echo 'RUC válido';
    } else {
        if ($validador->validarRucSociedadPrivada($numero)) {   // validar RUC sociedad privada
            $datos = array('estado' =>'OK');
            echo  json_encode($datos, true);
            //echo 'RUC válido';
        } else {
            if ($validador->validarRucSociedadPublica($numero)) {   // validar RUC sociedad ublica
                $datos = array('estado' =>'OK');
                echo  json_encode($datos, true);
                //echo 'RUC válido';
            } else {
                $datos = array('estado' =>'NO');
                echo json_encode($datos, true);
                //echo 'Cédula o RUC incorrecto: '.$validador->getMessage();
            }
        }
    }
}

    /*$numero = (string)$numero;  //convertir el input en variable de tipo String
	if ((strlen($numero) != 10) || (strlen($numero) != 13)) {     //longitud de CI o RUC es diferente de 10 o 13
		$datos = array('estado' =>'NO');
		echo json_encode($datos, true);
	} else {
		$arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);        //coeficientes Módulo 10
		$digitoVerificador = (int)$numero[9];                 //almacenar 10° dígito
        $digitosIniciales = str_split(substr($numero, 0, 9));   //almacena los 9 dígitos iniciales y los convierte de string en array
        $codigo_provincia = $digitosIniciales[0] * 10 + $digitosIniciales[1];   //almacena el código de provincia
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
        	$datos = array('estado' =>'NO');
            echo  json_encode($datos, true);
        }else{
        	$datos = array('estado' =>'OK');
        	echo  json_encode($datos, true);
        }
	}*/
?>