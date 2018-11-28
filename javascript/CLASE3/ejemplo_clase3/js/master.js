window.onload=function() {
    var subtitulo = document.getElementById("subtitulo")
    var titular = document.createElement("h2")
    titular.innerHTML = "Cursada <strong> Turno Noche 2</strong>" 
    titular.setAttribute("class", "text-center text-success")
    subtitulo.appendChild(titular)  
 

    var listaPadreUl = document.querySelector("ul")
    
    console.log(listaPadreUl.parentElement)

    var nuevoLista = document.createElement("li")
    nuevoLista.innerHTML = "Carro"
    nuevoLista.setAttribute("class","list-group-item")
    listaPadreUl.appendChild(nuevoLista)

}