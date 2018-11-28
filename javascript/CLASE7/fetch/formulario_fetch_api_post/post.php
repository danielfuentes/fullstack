<?php
$email = $_POST["email"];
$password = $_POST["password"];

if($email === "" || $password ===""){
    echo json_encode("error");
}else{
    echo json_encode("Bienvenido: "."<br>".$email. " ".$password);
}



?>