window.onload=function(){
    var mostrarDatos = document.getElementById("datos")
    var boton = document.getElementById("boton")
    boton.addEventListener("click", enviar)
    function enviar(){
        var nombre = document.getElementById("nombre").value
        var apellido = document.getElementById("apellido").value
        var datosCapturados = new FormData()
        datosCapturados.append("nombre",nombre)
        datosCapturados.append("apellido",apellido)
        var url = "procesarDatos.php"
        var xhr= new XMLHttpRequest()
        xhr.onreadystatechange=function(){
            if(xhr.readyState===4 && xhr.status===200){
                mostrarDatos.innerHTML = xhr.responseText
            }
        }
        xhr.open("POST",url,true)
        xhr.send(datosCapturados)
    }




}