<?php

$array = ["Hola", "Chau", "Si", "No"];
$opciones = [
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
];

foreach ($array as $string) {
$md5 = md5($string);
$sha1 = sha1($string);
$pwd_d = password_hash($string, PASSWORD_DEFAULT);
$pwd_b = password_hash($string, PASSWORD_BCRYPT);
$pwd_bs = password_hash($string, PASSWORD_DEFAULT, $opciones);

echo "md5: " . md5($string) . "<br>";
echo "sha1: " . sha1($string) . "<br>";
echo "PASSWORD_DEFAULT: " . $pwd_d . "<br>";
echo "PASSWORD_BCRYPT: " . $pwd_b . "<br>";
echo "PASSWORD_BCRYPT CON SALT: " . $pwd_bs . "<br><br>";
echo "VERIFICANDO </br>";
echo "PASSWORD_DEFAULT: " . PASSWORD_VERIFY($string, $pwd_d) . "<br>";
echo "PASSWORD_BCRYPT: " . PASSWORD_VERIFY($string, $pwd_b) . "<br>";
echo "PASSWORD_BCRYPT CON SALT: " . PASSWORD_VERIFY("$string", $pwd_bs) . "<br><br>";
}

 ?>
