window.onload=function(){
    var datos = document.getElementById("datos")
    //console.log(datos)
    var boton = document.getElementById("boton")
    boton.addEventListener("click",leer)
    //Creo la función que va a leer el archivo
    function leer(){
        //1.- Se determina la ruta donde esta el archivo a mostrar
        var url = "datos.txt"
        //2.- Se hace la instanciación del request
        var solicitud = new XMLHttpRequest()
        //3.- Se pone a escuchar a ese objeto y llamaría a un método
        solicitud.onreadystatechange = function() {
            if (solicitud.readyState == 4 && solicitud.status == 200) {
                datos.innerHTML=  solicitud.responseText
            }
        }    
        //4.-Se abre ahora una conexión
        solicitud.open("GET",url,true)
        //5.- Se debe especificar la información a enviar (Se colocal Null si no vamos a enviar nada)
        solicitud.send(null)
    }

}
