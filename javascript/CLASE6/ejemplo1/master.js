window.onload=function(){
    document.getElementById("dni").focus()
    var formulario=document.forms[0]
    //document.forms[0].elements.dni.focus()
    document.formulario.onsubmit=function(evento){
        evento.preventDefault()
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
        alert("Gracias por enviarnos tus datos")
        formulario.submit
    }








}




























/*
window.onload=function(){
document.formulario.elements.dni.focus()

document.formulario.onsubmit = function(evento){

    evento.preventDefault();
    //valido el dni
    if (document.getElementById('dni').value=== "") {
    alert("El DNI no lo puede dejar en blanco");
    document.formulario.elements.dni.focus();
    return;
    }
    if (document.getElementById('dni').value.length != 8) {
    alert("Ingrese un DNI valido de 8 digitos");
    document.formulario.elements.dni.focus();
    return;
    }

    //valido el nombre
    if (document.getElementById('formulario').elements['nombre'].value===""){
    alert('Indique su nombre, este campo no lo puede dejar en blanco');
    document.formulario.elements.nombre.focus();
    return;
    }

    //valido el apellido
    if (document.getElementById('apellido').value.length=== 0){
    alert('Indique su apellido, este campo no lo puede dejar en blanco');
    document.formulario.elements.apellido.focus();
    return;
    }

    //Valido los terminos y condiciones

    if (document.formulario.elements.terminos.checked != true) {
    return alert('Debes leer y aceptar los terminos y condiciones');
    }  

    //Aquí se simula que se estan enviando los datos del formulario
    alert('Muchas gracias por practicar y enviar estos datos');
    document.formulario.submit();
}
}
*/