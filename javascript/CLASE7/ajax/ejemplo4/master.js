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



    var datosMostrar = document.getElementById("datos")
    //console.log(datos)
    var boton = document.getElementById("archivos")
    //console.log(boton)
    boton.addEventListener("change", subirArchivos)

       function subirArchivos(evento){
        //Este es un array simple que almacena todos los archivos que seleccione el usuario
        var archivos = evento.target.files
        var archivo = archivos[0]
        //En este ejemplo este programa no hará nada ya que son varios los pasos que debemos trabajar ya vistos en php estructurado
        var url = "procesarArchivo.php"
        //Creamos una conexión
        var solicitud = new XMLHttpRequest
        //Ahora hacemos uso del atributo upload perteneciente al xmlhttprequest
        //Es decir que el objeto subirArchivo va a contener al archivo que se sube por elusuario
        var subidaArchivo = solicitud.upload
        //Este objeto desencada varios eventos (Cuando comienza la subida - cuando se ejecuta y cuando termina )
        subidaArchivo.addEventListener("loadstart",inicioProgreso)
        subidaArchivo.addEventListener("progress", estadoProgreso)
        subidaArchivo.addEventListener("load", mostrar)
        //Se hace la apertura de la conexion ojo: el archivo no va a hacer nada
        solicitud.open("POST",url,true)
        //Creamos el objeto formData
        var datos = new FormData
        //Le agregamos el archivo subido por el usuario
        datos.append("archivo",archivo)
        //Y ahora hago el envio
        solicitud.send(datos)

    }
    //Esta es la función que muestra los datos
    function mostrar(evento){
        datosMostrar.innerHTML="Proceso de carga terminado  !!!"
    }
    //Esta función lo que hace es generar la barra de progreso
    function inicioProgreso(){
        datosMostrar.innerHTML= "<progress value = '0' max = '100'></progress>"
    }
    //Esta función automaticamente va a estar siendo llamada cada 50 milisegundo
    function estadoProgreso(evento){
        var porcentaje = parseInt(evento.loaded / evento.total * 100)
        var barraProgreso = datos.querySelector("progress")
        console.log(barraProgreso)
        barraProgreso.value = porcentaje
        progreso.innerHTML = porcentaje + "%"

    }










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