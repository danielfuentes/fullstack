window.onload=function(){
    var datosMostrar = document.getElementById("datos") 
    var boton = document.getElementById("boton").addEventListener("click",leer)
    var url = "datos.txt"
    function leer(){
        var solicitud = new XMLHttpRequest
        solicitud.onreadystatechange= function(){
            if(solicitud.readyState===4 && solicitud.status===200){
                datosMostrar.innerHTML = solicitud.responseText
            }
        }
        solicitud.open("GET",url,true)
        solicitud.send(null)
    }

}