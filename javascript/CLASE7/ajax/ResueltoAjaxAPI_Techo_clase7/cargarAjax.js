
function nuevoAjax(){
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}


function cargarAjax( method, ruta, destino, callback ){
	
	var ajax=nuevoAjax();

	ajax.onreadystatechange=function(){

		if (ajax.readyState==4  && ajax.status == 200){
			//console.log(ajax.responseText);
			//console.log(JSON.parse(ajax.responseText));
			//return ajax.responseText;
			callback(destino, ajax.responseText);
		}
	};
	
	//console.log(ruta);

	ajax.open(method, ruta, true);
	
	//ajax.open(method, "http://pilote.techo.org/?do=api.getPaises", true);
	//ajax.open(method, "https://app.infobae.com/api/section/deportes/?outputType=jsonFront", true);
	//ajax.open(method, "http://api-editoriales.clarin.com/api/clima", true);
	var cadenaFormulario = "";

	if(method == 'POST'){

		var Formulario = document.getElementById('formulario');
		var longitudFormulario = Formulario.elements.length;

		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=ISO-8859-1');
		//ajax.setRequestHeader("Expires", "Sat, 26 Jul 1997 05:00:00 GMT");
		//ajax.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");
		//ajax.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");
		//ajax.setRequestHeader("Pragma", "no-cache");

		var sepCampos = "";
		var valorcadena='';

		var CaracteresEspeciales=/&|\+|\"/;

		for (var i=0; i <= longitudFormulario-1;i++) {
			if ((Formulario.elements[i].type=='checkbox')&&(Formulario.elements[i].checked==false)){
			}else if ((Formulario.elements[i].type=='radio')&&(Formulario.elements[i].checked==false)){

			}else if ((Formulario.elements[i].type=='select-multiple')){
				for (var j = 0; j < Formulario.elements[i].length; j++)
				{
					if (Formulario.elements[i].options[j].selected==true){
						cadenaFormulario += sepCampos+Formulario.elements[i].name+'='+encodeURI(Formulario.elements[i].options[j].value);
						sepCampos="&";
					}
				} 
			}else{
				if( (Formulario.elements[i].type=='radio' && Formulario.elements[i].checked==true) || (Formulario.elements[i].type=='checkbox' && Formulario.elements[i].checked==true) || (Formulario.elements[i].type=='button') || (Formulario.elements[i].type=='hidden') || (Formulario.elements[i].type=='text') || (Formulario.elements[i].type=='textarea') || (Formulario.elements[i].type=='select-one') || (Formulario.elements[i].type=='password') || (Formulario.elements[i].type=='file') || (Formulario.elements[i].type=='email') || (Formulario.elements[i].type=='date') || (Formulario.elements[i].type=='number')){

					if(Formulario.elements[i].value.search(CaracteresEspeciales)!=-1){
						valorcadena=encodeURIComponent(Formulario.elements[i].value);
					}else{
						valorcadena=encodeURI(Formulario.elements[i].value);
					}
				  cadenaFormulario += sepCampos+Formulario.elements[i].name+'='+valorcadena;
				  sepCampos="&";
				}
			}
		}
	}

	if( method == 'GET'){
		//ajax.setRequestHeader('Access-Control-Allow-Origin', '*');
		//ajax.setRequestHeader('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
		//ajax.setRequestHeader('Access-Control-Allow-Headers', 'accept, content-type, x-parse-application-id, x-parse-rest-api-key, x-parse-session-token');
	}

	ajax.send(cadenaFormulario);
}



// aqui van los callbacks de cada llamada al Ajax
function selectPaises(destino, respuesta){

	var datos = JSON.parse(respuesta);
	//document.getElementById(destino).innerHTML = ajax.responseText;
	//console.log(datos.contenido);
	//var paises = datos.contenido;

	var vSelect = document.getElementById(destino);
	vSelect.setAttribute("name", "nacionalidad");
	//vSelect.setAttribute("onChange", "console.log('hola');");

	
	for(var x in datos.contenido){
		//paises.push(datos.contenido[x]);
		var vOption = document.createElement("option");
		vOption.text = x;
		vOption.value = datos.contenido[x];
		vSelect.appendChild(vOption);
	}

	//document.getElementById(destino).replaceChild(vSelect, document.getElementById(destino).childNodes[0]);
}

function selectProvincias(destino, respuesta){

	var datos = JSON.parse(respuesta);

	var vSelect = document.getElementById(destino);
	vSelect.setAttribute("name", "provincia");

	var vOption = document.createElement("option");
		vOption.text = 'Seleccione';
		vOption.value = null;
		vSelect.appendChild(vOption);


	vSelect.onchange = function(){
	  if(this.value>0){
	  	//cargar las ciudades cuando se seleccione la provincia
	    cargarAjax('GET', 'http://pilote.techo.org/?do=api.getCiudades?idRegionLT='+this.value, 's-ciudad', selectCiudades);
	  }else{
	  	//eliminar los select cuando no se selecciona nada
	  	var vSelect2 = document.getElementById('s-ciudad');
		if ( vSelect2.hasChildNodes() ){
			while ( vSelect2.childNodes.length >= 1 ){
				vSelect2.removeChild( vSelect2.firstChild );
			}
		}
	  }
  	}; 	

  	//genero los options de las provincias
	for(var x in datos.contenido){
		var vOption = document.createElement("option");
		vOption.text = x;
		vOption.value = datos.contenido[x];
		vSelect.appendChild(vOption);
	}
}

function selectSedes(destino, respuesta){

	var datos = JSON.parse(respuesta);

	var vSelect = document.getElementById(destino);
	vSelect.setAttribute("name", "oficina");

	for(var x in datos.contenido){
		var vOption = document.createElement("option");
		vOption.text = x;
		vOption.value = datos.contenido[x];
		vSelect.appendChild(vOption);
	}
}

function selectCiudades(destino, respuesta){

	var datos = JSON.parse(respuesta);

	var vSelect = document.getElementById(destino);
	vSelect.setAttribute("name", "ciudad");

	if ( vSelect.hasChildNodes() ){
		while ( vSelect.childNodes.length >= 1 ){
			vSelect.removeChild( vSelect.firstChild );
		}
	}

	for(var x in datos.contenido){
		var vOption = document.createElement("option");
		vOption.text = x;
		vOption.value = datos.contenido[x];
		vSelect.appendChild(vOption);
	}
}


function registrarPersona(destino, respuesta){

	var datos = JSON.parse(respuesta);
	var vEl = document.getElementById('Errores');
	vEl.style.display='none';

	if(datos.error==true){
		
		vEl.style.display='block';

		if ( vEl.hasChildNodes() ){
			while ( vEl.childNodes.length >= 1 ){
				vEl.removeChild( vEl.firstChild );
			}
		}

		vEl.appendChild(document.createTextNode('Errores:'));

		var vOl = document.createElement("ol");		

		for(var x in datos.contenido){
			var vLi = document.createElement("li");
			vLi.appendChild(document.createTextNode(datos.contenido[x]));
			vOl.appendChild(vLi);
		}
		document.getElementById('Errores').appendChild(vOl);
	}else{
 		document.getElementById('segundaParte').style.display='none';
  		document.getElementById('primeraParte').style.display='none';
		document.getElementById('Exitoso').style.display='block';

	}

}

//fin de los callbacks

function siguienteSeccion(){
  document.getElementById('segundaParte').style.display='block';
  document.getElementById('primeraParte').style.display='none';
  document.getElementById('Errores').style.display='none';
  document.getElementById('Exitoso').style.display='none';
}


window.onload = function() {

  document.getElementById('segundaParte').style.display='none';
  document.getElementById('primeraParte').style.display='block';
  document.getElementById('Errores').style.display='none';
  document.getElementById('Exitoso').style.display='none';

  cargarAjax('GET', 'http://pilote.techo.org/?do=api.getPaises', 's-selectPaises', selectPaises);

  var botton=document.getElementById('btn-siguienteSeccion');
   botton.onclick = function() { siguienteSeccion();  };

  cargarAjax('GET', 'http://pilote.techo.org/?do=api.getRegiones?idPais=1', 's-provincia', selectProvincias);

  cargarAjax('GET', 'http://pilote.techo.org/?do=api.getUnidadesOrganizacionales?idPais=1', 's-sede', selectSedes);

   document.getElementById('btn-submit').onclick = function() { 

   	//falta la validacion del formulario javascript

 	cargarAjax('POST', 'http://pilote.techo.org/?do=api.registrarPersona', 'Exitoso', registrarPersona);

   };

}
