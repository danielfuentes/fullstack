window.onload=function(){
    var boton = document.getElementById("boton").addEventListener("click",leer)
    var mostrar = document.getElementById("contenido")
    function leer(){
        //console.log(mostrar.innerHTML= `<h2 class = " text-center text-success  ">Hola que tal</h2>`)
        //Lo primero es especificar la ruta la URL
        fetch("datos.txt")
        //Aquí creo una promesa con el tipo de dato a mostrar
        //Aquí pueden ver una forma que tengo para crear la función
        //.then(function (respuesta){
        //    return respuesta.text()
        //})
        .then(respuesta => respuesta.text())
        //.then(data => data.text())
        //Aquí creo la función que muestra los datos 
        .then(data=>{
            mostrar.innerHTML = `<h2 class="text-center text-primary">${data}</h2>`
        })
        
    }

}