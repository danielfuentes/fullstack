window.onload=function(){
    var boton = document.getElementById("boton").addEventListener("click",leer)
    var mostrar = document.getElementById("contenido")
    function leer(){
        //console.log(mostrar.innerHTML= `<h2 class = " text-center text-success  ">Hola que tal</h2>`)
        //Lo primero es especificar la ruta la URL
        //fetch("https://dev.digitalhouse.com/api/getProvincias/")
        fetch("ciudades_argentinas.json")
        //Aquí creo una promesa con el tipo de dato a mostrar
        .then(respuesta => respuesta.json())

        
        //Aquí creo la función que muestra los datos 
        .then(respuesta=>{
            console.log(respuesta)
            for(var indice in respuesta){
            //mostrar.innerHTML+= `<h4 class="text-center text-success">${respuesta[indice].country}  ${respuesta[indice].state}</h4>
            mostrar.innerHTML+= `<h4 class="text-center text-success">${respuesta[indice].nombre}  ${respuesta[indice].ciudades[indice].nombre}</h4>
            `
            }
        })
    }

}