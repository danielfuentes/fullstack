window.onload=function(){
    var titular = document.getElementById("titular")
    titular.style.display = "none";

    var lechuza = document.querySelector("#lechuza")
    lechuza.style.filter = "grayscale(100)"

    var Copirite = document.getElementById("copyright")
    console.log(Copirite.attributes)

    var H2 = document.querySelectorAll("h2")
    console.log(H2)
    //H2.style.color = "red"
    for(var i= 0; i<=H2.length;i++){
        H2.i.style.color ="magenta"
    }
    
    //Aquí les dejo las distintas formas de usar el recorrido del Array en Javascript Recuerda poner en comentario uno de los ciclos para que pongas a trabajar el otro.
    //Para poder revisarlas y verlas funcionar debes descomentarlas
    //H2[1].style.color ="blue"
    //H2.forEach(function(elemento){
    //    elemento.style.color = "red"
    //})


    //for(var elemento of H2){
    //    elemento.style.color="blue"
    //}


    //Aquí les dejo lo que practicamos al principio de la clase
    var aparecer = document.getElementById("abracadabra")
    aparecer.onmouseover=function(){
        titular.style.display = "block";
        lechuza.style.filter = "grayscale(0)"
    }

    aparecer.onmouseout=function(){
        titular.style.display = "none";
        lechuza.style.filter = "grayscale(100)"
    }

}