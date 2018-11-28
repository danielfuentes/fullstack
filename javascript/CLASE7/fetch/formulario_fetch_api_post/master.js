window.onload=function(){
    var formulario = document.getElementById("formulario")
    var respuesta = document.getElementById("respuesta")
    formulario.addEventListener("submit",function(evento){
        evento.preventDefault()
        var datos = new FormData(formulario)
        fetch('post.php',{
            method : 'POST',
            body : datos
        })
        .then(respuesta => respuesta.json())
        
        .then(data =>{
            if(data==="error"){
                respuesta.innerHTML = `<div class="alert alert-danger" role="alert">
                LLena todos los campos</div>`
            }else{respuesta.innerHTML = `<div class="alert alert-primary" role="alert">
            LLena todos los campos</div>`
            }
        })
    })    


}