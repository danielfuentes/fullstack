window.onload=function(){
    //La API Comucation posee
    //Una interfaz form Data, la cual posee un constructor formdata() y un método append(clave, valor)
    //Para enviar datos al servidor, utilizamos en metodo formdata con el metodo append y los utilizamos para meter datos y enviarlos. 
    var datos = document.getElementById("datos")
    //console.log(datos)
    
    var boton = document.getElementById("boton")
    boton.addEventListener("click",enviar)
    //Creo la función que va a leer el archivo es decir hace la solicitud al servidor remoto
    function enviar(){
        //Almacenar en una variable los datos que los usuarios han escrito en los cuadros de texto del formulario
        var nombre = document.getElementById("nombre").value
        var apellido = document.getElementById("apellido").value
        //Creamos un objeto formData el cual es al que le incorporamos la información que luego la vamos a enviar al servidor
        var datosEnviar = new FormData()
        //Le incorporamos datos al objeto
        datosEnviar.append("nombre",nombre)
        datosEnviar.append("apellido",apellido)
        //Ahora debemos crear la ruta del archivo que va a recibir los datos, en este caso un archivo .php
        var url = "procesarDatos.php"
        //Demeos ahora crear el objeto hmlhttprequest, para conectar con el servidor remoto
        var solicitud = new XMLHttpRequest
        //Cuando el objeto cargue que llame a una función
        solicitud.onreadystatechange = function() {
            if (solicitud.readyState == 4 && solicitud.status == 200) {
                datos.innerHTML=  solicitud.responseText
            }
        }    
        //solicitud.addEventListener("load", mostrar)
        //Ahora abrimos la conexión (Método (get o post, url y true = asincrono))
        solicitud.open("POST",url,true)
        //Ahora usamos el método send para enviar los datos al servdor
        solicitud.send(datosEnviar)

    }
    //Ahora creo la función mostrar, la cual es la que se ejecuta el xmlhttprequest
    //function mostrar(evento){
    //    datos.innerHTML=evento.target.responseText
    //}
    







    /*
    var boton = document.getElementById("boton")
    boton.addEventListener("click",cambiarTitutlo)
    boton.addEventListener("dblclick",mensaje)
    boton.addEventListener("mouseover",cambiarColorTitulo)
    boton.addEventListener("mouseout",cambiarOriginal)

    function mensaje(){
        swal("Hola estimados alumnos....!")
    }
    var titulo = document.querySelector("h1")
    function cambiarTitutlo(){
        titulo.innerHTML = "Estamos trabajando fulllllll"

    }

    function cambiarColorTitulo(){
        titulo.setAttribute("class","text-center text-danger")        
    }

    function cambiarOriginal(){
        titulo.setAttribute("class","text-center text-primary")        
    }

*/


}