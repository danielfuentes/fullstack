window.onload = function() {
var boton = document.getElementById("boton")
var mostrarDatos = document.getElementById("mostrar")
boton.addEventListener("click",mostrar)



    function mostrar() {
        var paises = new XMLHttpRequest();
        paises.onreadystatechange = function() {
            if (paises.readyState == 4 && paises.status == 200) {
                mostrarDatos.innerHTML=  paises.responseText

            }
        }
        paises.open("GET", "http://pilote.techo.org/admin/?do=api.getPaises", true);

        paises.send();
    }
}
