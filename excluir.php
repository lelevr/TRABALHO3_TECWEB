<?php
session_start();
if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projetos/');
}


require_once("Banco.php");
require_once("usuario.php");


// var_dump($_POST); die();

$usuario = new Usuario($_POST);

$pdo = new Banco();

// echo $produto->getUpdate(); die();
$linha = $pdo->exec( $usuario->getDelete() );


header('Location: http://localhost/projetos/consultaUsuario.php');

?>