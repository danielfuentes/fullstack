window.onload=function(){
    var boton = document.getElementById("boton").addEventListener("click",leer)
    var mostrar = document.getElementById("contenido")
    function leer(){
        //console.log(mostrar.innerHTML= `<h2 class = " text-center text-success  ">Hola que tal</h2>`)
        //Lo primero es especificar la ruta la URL
        fetch("https://randomuser.me/api/")
        //Aquí creo una promesa con el tipo de dato a mostrar
        .then(respuesta => respuesta.json())
        
        
        //Aquí creo la función que muestra los datos 
        .then(respuesta=>{
            console.log(respuesta.results)
            mostrar.innerHTML= `<img src="${respuesta.results[0].picture.large}" width = "100px" class= "rounded-circle img-fluid ">
            <h4 class="text-center text-success">${respuesta.results[0].name.first}  ${respuesta.results[0].name.last}</h4>
            `
        })
    }

}