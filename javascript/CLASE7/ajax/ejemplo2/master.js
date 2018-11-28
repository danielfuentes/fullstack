window.onload=function(){
    //Eventos del objeto: xmlhttprequest
    //loadstart - progreso - abort - error - load - timeout - loadend
    //Loadstart:Desencada la accion cuando comienza la descarga
    //Progreso: Desencada la accion cada 50  segundo
    //Abort Desencadena la accion si se desea abortar el progreso
    //error cuando hay un errro durante la conexion 
    //load  cuando la cnoexion a tenido lugar
    //timeout se le da un tiempo de Carga 
    //loadend cuando termina la conexion



    var datos = document.getElementById("datos")
    //console.log(datos)
    var progreso = document.getElementById("progreso")
    var boton = document.getElementById("boton")
    boton.addEventListener("click",leer)
    //Creo la función que va a leer el archivo es decir hace la solicitud al servidor remoto
    function leer(){
        //1.- Se determina la ruta donde esta el archivo a mostrar
        var url = "curso_basico_seguridad_informacion.ogv"
        //2.- Se hace la instanciación del request
        var solicitud = new XMLHttpRequest()
        //Se deben ahora agregar dos nuevos eventos
        //Primero el loadstart
        solicitud.addEventListener("loadstart", inicioProgreso)
        //Ahora llamo al evento progreso
        solicitud.addEventListener("progress", estado_progreso)

        //3.- Se pone a escuchar a ese objeto y llamaría a un método
        solicitud.addEventListener("load",mostrar)
        //4.-Se abre ahora una conexión
        solicitud.open("GET",url,true)
        //5.- Se debe especificar la información a enviar (Se colocal Null si no vamos a enviar nada)
        solicitud.send(null)
    }
    //Ahora creo la función mostrar, la cual es la que se ejecuta el xmlhttprequest
    function mostrar(evento){
        datos.innerHTML="Archivo leido !!!"
    }
    //Esta función lo que hace es generar la barra de progreso
    function inicioProgreso(){
        datos.innerHTML= "<progress value = '0' max = '100'></progress>"
    }
    //Esta función automaticamente va a estar siendo llamada cada 50 milisegundo
    function estado_progreso(evento){
        var porcentaje = parseInt(evento.loaded / evento.total * 100)
        var barraProgreso = datos.querySelector("progress")
        console.log(barraProgreso)
        barraProgreso.value = porcentaje
        progreso.innerHTML = porcentaje + "%"

    }








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