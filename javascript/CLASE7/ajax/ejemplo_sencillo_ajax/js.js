document.getElementById("cambiar").addEventListener("click",cambiar);
 
function cambiar(){
    var xhr = new XMLHttpRequest();
 
    xhr.open("GET","archivo.txt",true);
    xhr.send();
 
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById("parrafo").innerHTML = xhr.responseText;
        }
    }
}