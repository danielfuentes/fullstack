window.onload=function(){
    var textArea = document.getElementById("textarea").value
    var mostrarError = document.getElementById("error")
    var mostrarDatos = document.getElementById("datos")
    
    document.getElementById("guardar").addEventListener("click", guardarRecordatorio) 
    document.getElementById("borrar").addEventListener("click", borrarRecordatorio) 
    function guardarRecordatorio(){
        mostrarDatos.innerHTML = `${textArea}`
        localStorage.setItem("texto", textArea)

    }

    function borrarRecordatorio(){
        localStorage.getItem("texto", textArea)
    }
    
    
    
    //if(textArea === "" || textArea.length === null){
    //    mostrarError.innerHTML = `<div class="alert alert-danger" role="alert">
    //    Debe colocar algo a recordar!</div>`
    //}else{ mostrarError.innerHTML=`""`}    

    


}