window.onload = function() {
	var mostrarPaises = document.getElementById("contenido")
	getPaises()

	function getPaises() {
	var paises = new XMLHttpRequest()
	paises.onreadystatechange = function() {
		if (paises.readyState == 4 && paises.status == 200) {
			//console.log(JSON.parse(paises.responseText))
			let paises = paises.contenido
			console.log(paises)
			mostrarPaises.innerHTML= JSON.parse(paises.responseText)
		}
	}
	paises.open("GET", "http://pilote.techo.org/admin/?do=api.getPaises", true)
	paises.send()
	}


}
