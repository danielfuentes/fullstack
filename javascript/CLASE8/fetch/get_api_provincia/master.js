window.onload=function(){

    var mostrarSelect = document.querySelector("#select1")
    mostrarSelect.addEventListener("click",mostrarProvincias)
    
    
    //mostrarProvincias()
    function mostrarProvincias(){
        fetch("https://apis.datos.gob.ar/georef/api/provincias?campos=id,nombre")


        .then(respuesta => respuesta.json())
        //.then(function(respuesta){
        //    return respuesta.json()
        //})
        
        .then(data=>{
            for(var indice of data.provincias){
                //console.log(indice.id)
                //console.log(indice.nombre)
                
                var option = document.createElement("option")
                
                option.value =indice.id
                
                option.innerHTML= indice.nombre
                
                mostrarSelect.appendChild(option)
            }
        })

        
        /*
        .then(function(data){
            //console.log(data.provincias[0].id)
            //console.log(data.provincias[0].nombre)
            
            for(var indice of data.provincias){
                //console.log(indice.id)
                //console.log(indice.nombre)
                
                var option = document.createElement("option")
                
                option.value =indice.id
                
                option.innerHTML= indice.nombre
                
                mostrarSelect.appendChild(option)
            }
            
        })
        */
    }

    

}