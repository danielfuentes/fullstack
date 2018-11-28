var ironMan = {
	nombre: "Iron Man",
	poderes: ["Volar", "Lanzar misiles", "Disparar láser"],
	energia: 100,
	equipo: "Avengers",
	getPoder: function (i) {
		return this.poderes[i]
	}
}

var hulk = {
	nombre: "Hulk",
	poderes: ["Aplastar", "Gritar", "Golpear"],
	energia: 100,
	equipo: "Avengers",
	getPoder: function (i) {
		return this.poderes[i]
	}
}

while(ironMan.energia>0) {
	var randIron = Math.floor(Math.random() * 3);
	if (randIron == 0) {
		ironMan.energia = ironMan.energia - 10;
		console.log("Poder: "+ ironMan.getPoder(randIron)+ " - Energia:"+ ironMan.energia);
	}
	if (randIron == 1) {
		ironMan.energia = ironMan.energia - 15;
		console.log("Poder:"+ ironMan.getPoder(randIron)+ "- Energia:"+ ironMan.energia);
	}
	if (randIron == 2) {
		ironMan.energia = ironMan.energia - 25;
		console.log("Poder:"+ ironMan.getPoder(randIron)+ "- Energia:"+ ironMan.energia);
	}
} 


// console.log('Energia de IronMan:', ironMan.energia);

// // var randHulk = Math.floor(Math.random() * 3);
// // console.log(randHulk)
// // console.log(hulk.getPoder(randHulk));