<?php

require_once(__DIR__ . "/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../model/entities/usuario.php");

$username = $_POST['correo'];

$usuarios = leerUsuarios();
$user_existe = 0;

foreach ($usuarios as $aux) :
    if ($username === $aux['correo']) {
        $pass = $aux['password'];
        $user_existe = 1;
    }
endforeach;
if ($user_existe === 1) {
    //enviar correo 
    mail($aux['correo'], "Recuperar Contraseña", "Usted a pedido recuperar su contraseña por esta 
                        razon le hemos enviado un correo con su contraseña " . "\n" + $pass);
} else {
    //El correo no existe 
}
