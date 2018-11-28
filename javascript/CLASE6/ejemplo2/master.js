(function(){

//window.onload=function(){
    var miFormulario = document.formulario
    var dniRegex = (/^\d{8,}$/)
    var emailRegex = (/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/)
    //document.formulario.dni.focus()
    miFormulario.dni.focus()
    //document.getElementById("dni").focus()
    miFormulario.onsubmit=function(evento){
        evento.preventDefault()
        //var dni = document.getElementById("dni")
        var dni = miFormulario.dni
        console.log(dni)
        if(document.getElementById("dni").value === ""){
            swal("Error","No puedes dejar en Blanco","error")
            return false
        }
        if(dniRegex.test(dni.value)!=true){
            swal("Error","Debe tener 8 digitos","error")
            return false
        }
        if(emailRegex.test(document.getElementById("email").value)!=true){
            swal("Error","Correo no válido ","error")
            return false
        }
        var terminos = miFormulario.terminos
        if (document.getElementById("terminos").checked !=true){
            swal("Error","Acepte los terminos","error")
            return false
        }

    }




//}
}())