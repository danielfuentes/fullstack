window.onload=function(){
var mostrar = document.getElementById("mostrar")
var boton = document.getElementById("boton1")
boton.addEventListener("click",mostrarConversion)
//En esta función convierto de ObjetoJavaScript a JSON
function mostrarConversion(e)
{
  var obj={
    nombre:'Daniel Fuentes',
    edad:51,
    sueldos:[15000,12000,21000]
  };

  //Aqui paso el objeto literal a un objeto JSON
  var cadena = JSON.stringify(obj);
  alert(cadena)
  //Ahora esta cadena la convierto a un objeto literal javascript
  var cadena = JSON.parse(cadena)
  console.log(cadena)
  
  //alert(cadena);
  
}
}
