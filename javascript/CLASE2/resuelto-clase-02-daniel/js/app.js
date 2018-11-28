window.onload=function(){
//Recuerden que cada quien tiene su propia lógica para atacar y resolver probelmas, por lo tanto sigan estas solucones como guias de apoyo, y de comparación de sus soluciones.	
/* :::ITERADORES::: */
// Ej. 2 - Tabla de multiplicar
for (var i = 1; (i * 3) <= 135; i++) {
	console.log('3 x ' + i + ' = ' + (i * 3));
}

// Ej. 3 - Dado
var dado = Math.ceil(Math.random() * 6);
console.log('Valor random: ' + dado);
switch (dado) {
	case 2:
	case 4:
	case 6:
		console.log('El número ' + dado + ' es par.');
		break;
	default:
		console.log('El número ' + dado + ' es impar.');
}

// Ej. 4 - Aleatorio
var intentos = 0;
do {
	var aleatorio = Math.ceil(Math.random() * 37);
	intentos++;
} while (aleatorio !== 19);
console.log('Salió el número 19, se tomaron ' + intentos + ' intentos para ello');

// Ej. 5 - for / continue
var pares = [];
for (var n = 1; n <= 100; n++) {
	if (n % 2 === 0) pares.push(n);
	continue;
}
console.log(pares);

/* :::FUNCIONES::: */
// Ej. 1 - From object to array
var estudiante = {
	nombre: 'Daniel Rodo',
	curso: 'Javascript',
	dni: 25121977,
	email: 'danirodo@dh.com'
};

var objToArray = [];

function fromObjectToArray (obj) {
	for (var x in obj) objToArray.push(obj[x]);
	return objToArray;
}

console.log(fromObjectToArray(estudiante));

// Ej. 2 - Cambiar color del body
function cambiarColorDeFondoDelBody (color) {
	if (color !== 'green' && color !== '#0f0' && color !== '#00ff00') {
		document.body.style.backgroundColor = color;
		return true;
	}
	return false;
}

console.log('Cambió de color el body: ' + cambiarColorDeFondoDelBody('red'));

// Ej. 3 - Capturando los párrafos
var losP = document.querySelectorAll('p');

var recorrerLosPe = function (losPe) {
	var noAfectados = 0;
	for (var [i, element] of losPe.entries()) {
		if (i % 2 === 0) {
			element.style.backgroundColor = 'red';
			element.style.fontWeight = 'bold';
			element.style.textAlign = 'center';
		} else {
			noAfectados++;
		}
	}
	return noAfectados;
};

console.log('Párrafos no afectados: ' + recorrerLosPe(losP));

/* :::MÉTODOS DE ARRAY::: */
// Ej. 1 - Array de 1 al 20

var nuevoArray = [];

for (var z = 1; z <= 20; z++) {
	nuevoArray.push(z);
}

// Ej. 2 - Raíz cuadrada
var raizCuadrada = nuevoArray.map(function (item) {
	return Math.sqrt(item);
});

console.log(raizCuadrada);

// Ej. 3 - Detective
var enigma = ['l', 1, 'a', 2, 2, 5, 'p', 5, 7, 5, 3, 'e', 6, 'r', 7, 6, 5, 3, 2, 1, 's', 9, 9, 9, 6, 'e', 2, 'v', 5, 'e', 3, 'r', 2, 'a', 1, 6, 4, 1, 2, 'n', 2, 'c', 3, 5, 5, 5, 7, 'i', 4, 'a', 5, 2, 1, 3, 'e', 6, 's', 7, 'l', 4, 'a', 3, 'c', 2, 3, 1, 5, 3, 2, 'l', 3, 'a', 4, 'v', 5, 'e', 6];

var alturaCalle = enigma.filter(function (item) {
	return typeof item !== 'string';
}).reduce(function (acum, item) {
	return acum + item;
});

var nombreCalle = enigma.filter(function (item) {
	return typeof item !== 'number';
}).reduce(function (acum, item) {
	return acum + item;
}, '');

console.log(nombreCalle + ' ' + alturaCalle);
}