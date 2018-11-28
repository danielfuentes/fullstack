window.onload = function() {

var btnSiguiente = document.querySelector("#siguiente");
var form = document.querySelector("form");
//Guardo el id de país
var selectPais = document.querySelector("#pais");
//Guardo el id de la provincia
var selectRegion = document.querySelector("#region")
//Guardo el id de la sede
var selectUnidad = document.querySelector("#unidad");
//Guardo el id de la ciudad
var selectCiudad = document.querySelector("#ciudad");

btnSiguiente.addEventListener("click", seguir);



function seguir(evento) {
//	selectPais.remove();


	getUnidadesOrganizacionales(selectPais.value);
	getRegiones(selectPais.value);

	selectRegion.addEventListener("change", getCiudades);
}

//Aquí se llama a la función paises,para que cargue todos los paises
getPaises();
//En esta función se evidencian los 4 pasos para trabajarcon ajax
function getPaises() {
	//Se hace la instancia del metodo xmlhttprequest
	var ajax = new XMLHttpRequest();
	//Esta es la función que se encarga de ejecutar la acción de verificarla respuesta del servidor y mostrar los datos
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			//Esto debo hacerlo ya que la API me envia un objeto json
			var paises = JSON.parse(ajax.responseText);
			paises = paises.contenido;

			Object.keys(paises).forEach(function(pais) {
				var option = document.createElement("option");

				option.value = paises[pais];
				option.innerText = pais;

				selectPais.append(option);
			});
		}
	}
	ajax.open("GET", "http://pilote.techo.org/admin/?do=api.getPaises", true);
	ajax.send();
}

function getUnidadesOrganizacionales(id) {
	var ajax = new XMLHttpRequest();
	var url = "http://pilote.techo.org/admin/?do=api.getUnidadesOrganizacionales?idPais=";

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var unidades = JSON.parse(ajax.responseText);
			unidades = unidades.contenido;

			Object.keys(unidades).forEach(function(unidad) {
				var option = document.createElement("option");

				option.value = unidades[unidad];
				option.innerText = unidad;

				selectUnidad.append(option);
			});
		}
	}
	ajax.open("GET", url + id, true);

	ajax.send();
}

function getRegiones(id) {
	var ajax = new XMLHttpRequest();
	var url = "http://pilote.techo.org/admin/?do=api.getRegiones?idPais=";

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var regiones = JSON.parse(ajax.responseText);
			regiones = regiones.contenido;

			Object.keys(regiones).forEach(function(region) {
				var option = document.createElement("option");

				option.value = regiones[region];
				option.innerText = region;

				selectRegion.append(option);
			});
		}
	}
	ajax.open("GET", url + id, true);
	ajax.send();
}

function getCiudades() {
	var ajax = new XMLHttpRequest();
	var url = "http://pilote.techo.org/admin/?do=api.getCiudades?idRegionLT=";
	var id = selectRegion.value;

	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var ciudades = JSON.parse(ajax.responseText);
			ciudades = ciudades.contenido;

			Object.keys(ciudades).forEach(function(ciudad) {
				var option = document.createElement("option");

				option.value = ciudades[ciudad];
				option.innerText = ciudad;

				selectCiudad.append(option);
			});
		}
	}
	ajax.open("GET", url + id, true);
	ajax.send();
}

}
