window.onload = function() {
	var objeto = {
		asd: "test"
	};

	var amigos = {
		amigos: 4,
		nombres: ["tito", "moncho", "rhodesio", "jorge"]
	};

	var objetoRelleno = {
		test: 1,
		test1: "test"
	};

	var objetoFinal = {
		array: [objetoRelleno, objetoRelleno, objetoRelleno]
	}

	console.log(JSON.stringify(objeto));
	console.log(JSON.stringify(amigos));
	console.log(JSON.stringify(objetoFinal));

	console.log(objetoFinal.array[0]);

}
