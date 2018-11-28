window.onload=function(){
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




}