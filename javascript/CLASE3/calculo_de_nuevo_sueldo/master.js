window.onload=function(){
    var entrar = true
    while (entrar==true) {
        
        do {
            var nombre = prompt("Cual es tu nombre?")
            if(nombre==null || nombre == ""){
                alert("Nombre no puede ser blanco Capo!!!")
            }
        } while (nombre==null || nombre == "");

        do {
            var sueldo = parseFloat(prompt("Cual es tu sueldo?"))    
        } while (isNaN(sueldo)||sueldo<=0   );
 

        
        var porcentaje = parseInt(prompt("Porcentaje de aumento deseado?"))
        var nuevoSueldo = ((sueldo*porcentaje)/100)+sueldo
        alert("Estimado(a) " +nombre + "Su nuevo sueldo es: "+nuevoSueldo)
        entrar = confirm("Desea continuar?")

    }
    location.href = "https://adanielf.wordpress.com"

}