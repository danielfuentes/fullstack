// Definimos un listener para el evento load y llamamos a la función doLoad

window.addEventListener("load", doLoad);

function doLoad() {
  // Declaramos y definimos una variable para el botón Buscar
  var buscar = document.querySelector("#buscar");

  // Definimos la función para cuando hacemos click en Buscar

  buscar.onclick = function() {

    // Declaramos y definimos una variable para la imagen cuyo ID es "loading"

    var loading = document.querySelector("#loading");

    // Cambiamos el valor de la propiedad "display" a block
    loading.style.display = "block";

    //Declaramos y definimos dos variables cuyos valores son los ingresados en los inputs

    var artista = document.querySelector("#artista").value;
    var cancion = document.querySelector("#cancion").value;

    // Declaramos y definimos una variable para nuestro párrafo donde se mostrará el resultado
    var lyrics = document.querySelector("#lyrics");


    // Declaramos y definimos una variable cuyo valor es una nueva instancia de un objeto XMLHttpRequest
    var pedidoLyrics = new XMLHttpRequest();

    // Creamos un objeto función para manejar eventos y lo asignamos al atributo de la solicitud onreadystatechange
    pedidoLyrics.onreadystatechange = function() {

      //  Este manejador observa el readyState de la solicitud verificando si la transacción se ha completado, y si así es, y el estatus HTTP es 200, entra en el IF
      if (pedidoLyrics.readyState == 4 && pedidoLyrics.status == 200) {

        // Cambiamos el valor de la propiedad "display" a none de la imagen
        loading.style.display = "none";

        // Declaramos y definimos una variable cuyo valor es la respuesta transformada a JSON
    		var info = JSON.parse(pedidoLyrics.responseText);

        // Definimos el contenido de nuestro párrafo resultado con el valor del atributo lyrics de la respuesta

        lyrics.innerText = info.lyrics
    	}


       // Si la transacción se ha completado, y el estatus HTTP es 404, entra en el IF
      if (pedidoLyrics.readyState == 4 && pedidoLyrics.status == 404) {

        // Definimos el contenido de nuestro párrafo resultado con un mensaje de error
        lyrics.innerText = "No encontré la canción";
      }
    };

      // El método open() inicializa una solicitud recién creada o reinicializa una existente. En este caso, hace un pedido por GET con el URL de la API y los valores de nuestros inputs

      pedidoLyrics.open("GET", "https://api.lyrics.ovh/v1/" + artista + "/" + cancion, true);

      // El método send() envía la solicitud al servidor

    pedidoLyrics.send();

  }
}
