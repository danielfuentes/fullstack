//(function(){
//  window.onload = function(){

        var nombre = "Ángel Daniel Fuentes"
        
        //var extraer = nombre.slice(-5,nombre.length)
        //var extraer = nombre.slice(-5,nombre.length)
        
        //Para saber la longitud de una cadena de caracteres
        //var cambioNombre = nombre.length
        //Para tomar una porción de la cadena
        //var cambioNombre = nombre.substring(0,12)
        //var cambioNombre = nombre.substr(0,12)
        //Con este método podemos verificar si una letra está dentro de la cadena o dentro de un array indexOf("Lo que queremos buscar") - Si no lo encuentra retorna -1 La posición la trae partiendo de la idea los indices de un array
        //var cambioNombre = nombre.indexOf("D")
        //Yo también le puedo decir desde donde quiero que empiece a buscar
        //var cambioNombre = nombre.indexOf("n","6")
        //Con esta función podemos buscar la letra desde el final al principio
        //var cambioNombre = nombre.lastIndexOf("n")
        //Este método nos sirve para reemplazar una cadena por otra
        //var cambioNombre = nombre.replace(nombre, "Amo a mi Familia fullllll")
        //Para pasar de minusculas a MAYUSCULAS
        //var cambioNombre = nombre.toUpperCase()
        //Para cambiar de MAYUSCULAS A minusculas
        //var cambioNombre = nombre.toLowerCase()
        //Repasando settimeout y setinterval
        //setTimeout se ejecuta una sóla vez, luego que se cumpla el tiempo colocado
        var saludar = function(){
            swal("Hola:"+nombre)
        }
        //setTimeout(saludar,3000)
        //setInterval ejecuta la función cada vez que se cumpla el tiempo estipulado
        
        var contador = 0
        var saludar = function(){

            swal("Hola:"+nombre)
            contador++
            if(contador==10){
                clearInterval(intervalo)
            }
        }

        var intervalo= setInterval(saludar,10000)
        /*

        //*****METODOS PARA EL MANEJO DE FECHAS */
        /*
        var cambioNombre = 0
        var actualizarHora = function(){
            var fecha = new Date()
            //console.log(fecha)

            var diaDeLaSemana = fecha.getDate()
            var dia = fecha.getDay()
            var mes = fecha.getMonth()
            var anio = fecha.getFullYear()
            var hora = fecha.getHours()
            var minutos = fecha.getMinutes()
            var segundo = fecha.getSeconds()

            var segundos = document.getElementById("segundos")
            segundos.innerHTML="Contando los segundos: " +segundo
            segundos.setAttribute("class","text-center text-success")



        }
        */
        //actualizarHora()
        //setInterval(actualizarHora,1000)

        //Puse esto en comentarios para ver los segundos
        var mostrarHtml = document.createElement("h2")
        mostrarHtml.innerHTML=cambioNombre
        mostrarHtml.setAttribute("class","text-center text-success")
        document.body.appendChild(mostrarHtml)
        document.write(cambioNombre)




//}
//}())
