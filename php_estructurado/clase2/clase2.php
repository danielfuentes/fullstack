<?php
//Programa para demostar la funcionalidad de php
//Variables - Array - Condiciones
$dni = "12345678";
$nombre = "Daniel";
$apellido = "Fuentes";
$sueldo = 8000;
$dia=5;
$dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo"];
$evaluacion = 1;
$niveles_evaluacion=["Regular","Bueno","Excelente"];
$porcentaje =[10,20,30];

//Cálculo del aumento


if ($evaluacion >2 || $dia >7){
  echo "La evaluación debe ser sólo:  (0) = Regular (1) = Bueno (2) = Excelente"."<br>";
  echo "El día a especificar debe estar comprendido entre 0 y 7";

}else {
  if($niveles_evaluacion[0]==$niveles_evaluacion[$evaluacion]){
    $aumento = ($sueldo * $porcentaje[$evaluacion])/100;
    $nuevo_sueldo= $sueldo + $aumento;
  }elseif ($niveles_evaluacion[1]==$niveles_evaluacion[$evaluacion]) {
    $aumento = ($sueldo * $porcentaje[$evaluacion])/100;
    $nuevo_sueldo= $sueldo + $aumento;
  }elseif ($niveles_evaluacion[2]==$niveles_evaluacion[$evaluacion]) {
    $aumento = ($sueldo * $porcentaje[$evaluacion])/100;
    $nuevo_sueldo= $sueldo + $aumento;
  }
  echo "<h1>"."Estimado(a) ".$nombre. " ".$apellido.", portador del DNI: ".$dni . ", le informamos que el día de hoy: ".
        $dias[$dia]. ", de acuerdo al nivel de evaluación obtenido: ".  $niveles_evaluacion[$evaluacion]
        .", usted ha recibido un aumento del ".$porcentaje[$evaluacion]
        ."%".", siendo su aumento de: ".$aumento." y su nuevo sueldo es de: ".$nuevo_sueldo. "<br>"."<hr>"."  !!! Felicitaciones !!!"."</h1>";

}












 ?>
