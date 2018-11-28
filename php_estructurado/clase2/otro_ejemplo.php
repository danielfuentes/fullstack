<?php
    //PROGRAMA PARA CALCULAR EL AUMENTO DEL PASAJE DE ACUERDO A UN
    //TIPO DE TRANSPORTE SELECCIONADO POR EL USUARIO
    //DESARROLLADO:  MSc. Ángel Daniel Fuentes - 23/08/2018 20:05 pm

    //------- SOLICITUD DE LOS DATOS ----------------------------
    $nombre="Daniel";
    $apellido="Fuentes";
    $tipo_transporte= 1;
    $pagoactual = 10;
    //----------------------------------------------------------
    //AQUI DECLARO MIS ARRAY -----------------------------------
    $transporte=["Tren","Subte","Autobus"];
    $aumentos=[5,10,15];
    //AQUÍ EVALUO EL DATO QUE EL USUARIO COLOCO ---------------    

    if($tipo_transporte<0 || $tipo_transporte >2 ){
        echo "<h2>"."Debe seleccionar: 0=Tren  1 = Subte 2 =Autobus"."</h2>";
        exit();
    //AQUI EJECUTO MIS VALIDACIONES Y MIS OPERACIONES ------------

    }elseif($tipo_transporte==0){
        $aumento = ($pagoactual*$aumentos[0]/100);
    }elseif($tipo_transporte==1){
        $aumento = ($pagoactual*$aumentos[1]/100);
    }else{
        $aumento = ($pagoactual*$aumentos[2]/100);    
    }    
    $nuevoPago= $pagoactual+$aumento;
    //----------SI TODO ESTA BIEN ENVIO LA RESPUESTA -----------------
    echo "<h2>"."Estimado (a): ".$nombre. " ".$apellido.
    " le informamos que el servicio de transporte que utiliza "
    . $transporte[$tipo_transporte]. " que venia pagando ". $pagoactual.
    "$"." a partir de hoy tiene un aumento de ".
    $aumento. "$"." y va a pagar de ahora en adelante ".$nuevoPago. "$"."</h2>"

?>