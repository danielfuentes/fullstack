
<?php
//Programa para demostar la funcionalidad de php
//Switch case - Ciclos - Array - Condiciones - foreach
//Para mis alumnos de Digital House
//MSc. Angel Daniel Fuentes

//Inicialización de las variables

//Datos a ser suminsitrados por el usuario
$dni = "12345678";
$nombre = "Daniel";
$apellido = "Fuentes";


// ------------------Datos que debes incorporar manualmente -------------------------------
//Validar que sólo el usuario proporcione un valor del 1 al 7 y utilice  swicth case para mostrar el dia seleccionado, ojo si no cumple la condición no debe avanzar el programa el mismo debe finalizar
$dia=7;
//Validar que el monto sea mayor ó igual de $1000 y menor ó igual a $72000, de no cumplir con la condición el prpgrama se debe finalizar
$monto=50000;
//Validar que la cuota debe ser mayor de 3 y menor e igual a 36 - De no cumplir la condición  el programa debe finalizar
$cuotas =6;
//El porcentaje debe validar que el mismo sólo podrá ser: 5% - 10% -15% o 20% de no cumplir la condición debe finalizar
$porcentaje =10;
//-------------------------------------------------------------------------------------------

//Estas variables se deben calcular
$monto_cuota=0;
$monto_deuda=0;
//Array que va a almacenar las cuotas a pagar

$cuotas_pagar=[];

/*Haciendo uso del ciclo while o el for ejecute la solución de este ejercicio, se espera que se indique por pantalla los datos del cliente así como una tabla donde muestre el monto de cada  cuota en base al porcentaje indicado - Tenga pendiente las validaciones respectivas*/

//Aquí valido el día

switch ($dia) {
  case 1:
    $dia = "Lunes";
    break;
  case 2:
    $dia = "Martes";
    break;
  case 3:
    $dia = "Miercoles";
    break;
  case 4:
    $dia = "Jueves";
    break;
  case 5:
    $dia = "Viernes";
    break;
  case 6:
    $dia = "Sábado";
    break;
  case 7:
    $dia = "Domingo";
    break;
  default:
    echo  "<h2> Debe especificar un día de la semana del 1 al 7 </h2>";
    exit;
}

//valido el monto cuotas y porcentaje

if ($monto < 1000 || $monto>72000) {
  echo "<h2> Los montos de los prestamos deben ser mayor ó igual a $1000 y menor e igual a $72000 </h2>";
  exit;

} elseif ($cuotas <3  || $cuotas>36) {
    echo "<h2>Las cuotas deben estar comprendidas entre 3 y 36</h2>";
    exit;
}elseif ($porcentaje !=5 && $porcentaje !=10 && $porcentaje !=15 && $porcentaje !=20 ) {
    echo "<h2>Los porcentajes de prestamos validos son: 5% - 10% - 15% ó 20%</h2>";
    exit;
}

//Ejecuto el calculo de la deuda del cliente
$monto_deuda=($monto*$porcentaje/100)+$monto;


//Ahora ejecuto los calculos de las cuotas a pagar por el cliente y las guardo en un array

for ($i=1; $i <= $cuotas; $i++) {
  $monto_cuota = $monto_deuda/$cuotas;
  $cuotas_pagar[$i]=$monto_cuota;
}

//Ahora imprimo los resultados de mi programa
$mensaje = "<h1>Estimado: $nombre $apellido el día de hoy $dia se le aprobó el crédito de: $ $monto ,  a una tasa del: $porcentaje %,  usted debe cancelar un total en pesos de: $$monto_deuda, a razón de: $cuotas cuotas, y el valor de cada una es de:</h1> <br>";
echo $mensaje;

//Aquí debo recorrer el array con foreach y mostrar las cuotas a pagar
foreach ($cuotas_pagar as $indice => $valor) {
  echo "<hr>";
  echo "<h3>Nro. de la cuota : $indice  Monto a pagar: $valor</h3>";
}
  echo "<hr>";
  echo "<h4>Gracias por confiar en nuestro servicio de prestamo en línea.......";

 ?>
