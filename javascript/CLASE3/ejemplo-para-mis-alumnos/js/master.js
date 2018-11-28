window.onload=function(){
//Practica de la clase 3
    //var elementosLi = document.querySelectorAll("li")
    //var elementosP = document.getElementsByTagName("p")
    //console.log(elementosP)
    
    //var padreElementosLi = document.parentElement
    //console.log(elementosLi)
    //console.log(padreElementosLi)
    var elementoH2 = document.createElement("h2")
    elementoH2.innerHTML = "Cursada <strong>Turno</strong> Noche 2"
    elementoH2.setAttribute("class","text-center text-success")

    var subTitulo = document.getElementById("subtitulo")

    subTitulo.appendChild(elementoH2)
    // Ahora trabajo con las listas
    var listaUl = document.querySelector("li")
    var listaPadre = listaUl.parentElement
    //console.log(listaPadre)
    //Voy agregar un nuevo elemento a la lista
    var nuevoElementoLista = document.createElement("li")
    nuevoElementoLista.innerHTML = "Carro"
    nuevoElementoLista.setAttribute("class","list-group-item")
    listaPadre.appendChild(nuevoElementoLista)
    // Aquí quiero mostrar por consola todos los elementos de la lista
    var listadoLi = document.querySelector("ul")
    ListadoFinalLi = listadoLi.children
    console.log(ListadoFinalLi)
    for (let valor of ListadoFinalLi){
        console.log(valor.innerHTML)
    }
    //for (var Index =0; Index<=ListadoFinalLi.length;Index++){
    //    console.log(ListadoFinalLi[Index].innerHTML)
    }

    


/*  
//Parctica Clase 1 
swal("Excelente!", "Acciona clic e el botón, para continuar!", "success")
var parrafo = document.querySelectorAll(".parrafo")
for (var i = 0; i<=parrafo.length;i++){
    if(i===1){
      continue    //Esto lo coloque para que no pinte este parrafo
    }
    parrafo[i].style.backgroundColor = "yellow"

}

}

var parrafo2 = document.getElementById("parrafo2")
console.log(parrafo2)
parrafo2.style.color = "white"
parrafo2.style.backgroundColor="red"


//Este metodo se ejecuta luego que el usuario acciona clic en el botón.
function accion(){
    var titulo = document.getElementById("titulo")
    titulo.style.color = "blue"
    var parrafo = document.querySelectorAll(".parrafo")
    for (var i = 0; i<=parrafo.length;i++){
        if(i===1){
          continue
        }
        parrafo[i].style.backgroundColor = "red"
        parrafo[i].style.color = "white"
    
    }
    
}


/*
//Probando los ejemplos de las láminas
//Por si no me explique al momento y sobre todo por si hay algún detalle en ellas. Amigos para poder ver su funcionamiento deben quitarle los comentarios, ya se que lo saben, pero recuerden que yo hablo fulllll y me gusta explicar hasta el último detalle. Abrazos.

//Lamina ciclo for
for (var i = 0; i < 4; i++) {
    console.log("Daniel " + i);

    document.write("daniel "+i+"<br>")
    }
    
//Lamina switch    
    var fruta = "pera";

    switch (fruta) {
    case "frutilla": console.log("La frutilla del postre");
    break;
    case "manzana": console.log("Me prestas tu reloj? Manzana");
    break;
    case "pera": console.log("2 pesitos la pera!");
    break;
    default: console.log("Es otra fruta");
}
/*    
//Lamina Ciclos
for (var i = 0; i < 5; i++) {
    console.log("Hola " + i);
if(i === 1){
break; // corta el búcle FOR
}
console.log('Chau');
}

//Lo del continue
for (var i = 0; i < 5; i++) {
    console.log("Hola " + i);
if(i === 3){
continue; // Salta la iteración cuando i es 3 y continúa sin cortar el bucle
}
console.log("Hola " + i);
console.log('Chau');
}

//Funciones vistas por ecma6
var elProducto = (n1,n2)=>n1*n2
//Llamo a la función

console.log(elProducto(10,10))
document.write("<br>"+elProducto(10,10))

//Funciones dentro de otras funciones - Closures
function test(string){
    var variableLocal = "Digital";
    function funcionInterna(){
        return variableLocal + " " + string;
}    
return funcionInterna();
}
console.log(test("House")); // "Digital House"

}

//Metodo Reduce
var miArray = [1, 2, 3]
var sumado = miArray.reduce(function(acumulador, elementoActual){
    return acumulador + elementoActual
}, 0)

console.log(sumado)

*/