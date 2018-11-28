//Instrucciones Javascript ecma script 6 - 2015

/*document.write(typeof 5)
document.write("<br>")
document.write(typeof "Daniel")
document.write("<br>")
//Array
var lenguajes = new Array("javascript","C","Ruby","PHP")
document.write(lenguajes)
document.write("<br>")
document.write(lenguajes[0])
document.write("<br>")
document.write(lenguajes[1])
document.write("<br>")
lenguajes.push("Clipper")
document.write("<br>")
document.write(lenguajes)
document.write("<br>")
lenguajes.pop()
document.write("<br>")
document.write(lenguajes)
//Map - Estructura de datos - clave valor
var Persona = new Map()
Persona.set("nombre","Daniel")
Persona.set("apellido","Fuentes")
Persona.set("edad","51")
Persona.set("sueldo",15000)
document.write("<br>")
document.write(Persona.get("nombre"))
document.write("<br>")
document.write(Persona.has("apellido"))
document.write("<br>")
document.write(Persona.delete("sueldo"))
document.write("<br>")
//Aqui pregunto a ver si existe la propiedad
document.write(Persona.has("sueldo"))
//Trabajando con SET o conjntos
var hermanos = new Set()
hermanos.add("Yuraima")
hermanos.add("Zulay")
hermanos.add("Henry")
hermanos.add("Joel")
document.write("<br>")
console.log(hermanos)
document.write("<br>")
hermanos.delete("Joel")
console.log(hermanos)

//Asignación de desestructuración
var animales  = new Array()
var [Perro,Gato,Ratón] = animales
document.write("<br>")
document.write(animales)
*/
//Ciclo for of - Sirve para rrecorrer Map - Colecciones - Array
var lenguajes = new Array("javascript","C","Ruby","PHP")
for ( var lenguaje of lenguajes){
    document.write(lenguaje +"<br>")
}

//También prudo recorrer string
var dh = "Digital House"
for (let digital of dh){
    document.write(digital+"<br>")
}
//Funciones
function saludar(nombre){
    console.log("Hola estimado (a): "+nombre)
    document.write("<br>")
    document.write("Hola estimado: "+nombre)
    
}

saludar("Angel Daniel")

//Pasando parametros por defecto a la función
function nombreApellido(nombre="sin nombre", apellido="sin apellido"){
    document.write("Hola estimado : "+nombre +" "+apellido)
}
//Prueba esto sin enviar valores
document.write("<br>")
nombreApellido()
//Prueba esto colocando valores
document.write("<br>")
nombreApellido("Luis","Fuentes")
document.write("<br>")
nombreApellido("Victor","Fuentes")
//Parámetros spread
function miFamilia(esposa,hija1,hijo1,hijo2)
{
 document.write("<br>")   
 document.write("Mi esposa se llama: "+ esposa+" "+"Mi hija: "+hija1+" "+"Mi hijo mayor: "+hijo1+" "+ "y mi hijo menor: "+hijo2 )
}
var myfamily = new Array("Gloria","Indira","Victor","Luis")

miFamilia(...myfamily)

//Parámetros Rest o Agrupados
function saludarHijos(...hijos){
    for( let hijo of hijos){
        document.write("<br>")
        document.write(hijo)
    }
}
saludarHijos("Indira","Luis","Victor")

//Función flecha
var sumar = (valor1,valor2) => valor1+valor2

var resultado = sumar(2,2)
document.write("<br>")
document.write("La suma de los valores es: "+resultado)
document.write("<br>")
document.write("La suma de los valores es: "+sumar(10,10))

//Creación de clases con ecma script 6
class Persona{
    constructor(nombre,apellido,correo ){
        this.nombre = nombre
        this.apellido = apellido
        this.correo = correo
    }
    //Dentro de la clase puedo crear los metodos que desee
    caminar(){
        return "Voy caminando poco a poco amigo!!!!"
    }
    static correr(){
        return "Voy corriendo mi amigo!!!!"
    }
}
var profesor = new Persona("Rodo","Fuentes","rodofuentes@dh.com")
document.write("<br>")
document.write(profesor.nombre)
document.write("<br>")
document.write(profesor.apellido)
document.write("<br>")
document.write(profesor.correo)
document.write("<br>")
console.log(profesor.caminar())
document.write(profesor.caminar())
//Aqui no requiero instanciar al objeto ya que la función es estatica
document.write("<br>")
console.log(Persona.correr())
document.write(Persona.correr())


// Javascript Normal como lo podemos encontar en muchas páginas web
