window.onload=function(){
    
    var continuar = confirm("Bienvenido al cuestionario, desea responder ahora?")
    if (continuar !== true){
        
        window.location="http://adanielf.wordpress.com"
        
    }    
    var salida =true;
    var registros = []
    while(salida===true) {
        do {
            var nombre= prompt("Indique su nombre")    
            if (nombre === "") {
                alert("Este campo no puede ser blanco, Capo!!!")
            }
        } while (nombre==="");
            
        
        do {
            var sueldo = parseFloat(prompt("Indique su sueldo"));    
            if (isNaN(sueldo)) {
                alert("Debe colocar un sueldo")
            }
        } while (isNaN(sueldo));
        
        var porcentaje = parseInt(prompt("Porcentaje de Aumanento"));
        
        var nuevoSueldo = ((sueldo*porcentaje)/100)+sueldo;
        
        alert("Estimado (a) :"+nombre+ " su nuevo sueldo es de: "+nuevoSueldo);
        
        registros.push({nombre: nombre,sueldo:sueldo,porcentaje:porcentaje,nuevosueldo: nuevoSueldo})
        var salida= confirm("Desea continuar");
        if(salida===false){
            registros.forEach(function(elemento) {
                console.log(elemento)
            });
            
            var nuevoTitulo = document.createElement("h2")
            nuevoTitulo.innerHTML="<strong>Gracias por compartir su información</strong>"
            nuevoTitulo.setAttribute("color","red")
            document.body.appendChild(nuevoTitulo)
            
            
        }
        swal("Gracias por participar....");
    }

}    
