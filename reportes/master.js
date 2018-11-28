window.onload=function(){
    document.getElementById("dni").focus()
    var formulario=document.forms[0]
    //document.forms[0].elements.dni.focus()
    document.formulario.onsubmit=function(evento){
        if(!validaciones()){
            evento.preventDefault()
        }else{
            formulario.submit
        }
    }    

        function validaciones(){
            if(document.getElementById('dni').value.length ===0){
                alert("El campo no lo puede dejar en blanco")
                document.getElementById("dni").focus()
                return false
            }

            if(document.getElementById('nombre').value===""){
                alert("El campo no lo puede dejar en blanco")
                document.getElementById("nombre").focus()
                return false
            }
            if(document.getElementById('apellido').value===""){
                alert("El campo no lo puede dejar en blanco")
                document.getElementById("apellido").focus()
                return false
            }
            if(document.getElementById("terminos").checked != true){
                alert("Debe aceptar los terminos")
                document.getElementById("terminos").focus()
                return false
            }
        return true
        }
}
