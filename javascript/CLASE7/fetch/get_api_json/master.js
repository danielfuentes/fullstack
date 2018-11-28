window.onload=function(){
    var boton = document.getElementById("boton").addEventListener("click",leer)
    var mostrar = document.getElementById("contenido")
    //Lo comentado es la demostración de let para declarar variables que aunque tengan el mismo nombre,no se pisa su valor
    //let sexo = "Femenino"
    //let nombre = "Gloria"
    
    //if (sexo != "Masculino"){
    // console.log(nombre)
    //}else{
    //    let nombre = "Gloria"
    //    console.log(nombre)
    //}    
    //console.log("Desde el año 1991, yo estoy muy Feliz con mi esposa:" + nombre)

    function leer(){
        fetch("personas.json")
        .then(respuesta => respuesta.json())
        .then(datos =>{
            console.log(datos)
            mostrar.innerHTML = ""
            for(var indice of datos){
            mostrar.innerHTML += `
            <tr>
                <th scope="row">${indice.nombre}</th>
                <td>${indice.edad}</td>
                <td>${indice.nacionalidad}</td>
                <td>${indice.altura}</td>
              </tr>`
        }
            
        })
    }
    

}