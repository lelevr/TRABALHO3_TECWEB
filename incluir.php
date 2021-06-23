<?php
session_start();
if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projetos/');
}


require_once("Banco.php");
require_once("usuario.php");


var_dump($_POST);

$usuario = new Usuario($_POST);

$pdo = new Banco();

$linha = $pdo->exec( $usuario->getInsert() );

if ($linha > 0 ) {
    header('Location: http://localhost/projetos/incluirUsuario.php?ok=1');
}else{
    echo "erro";
}

?>