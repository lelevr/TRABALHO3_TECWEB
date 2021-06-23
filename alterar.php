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
$linha = $pdo->exec( $usuario->getUpdate() );

if ($linha > 0 ) {
    header('Location: http://localhost/projetos/editarUsuario.php?ok=1&id='.$_POST['id']);
}else{
    header('Location: http://localhost/projetos/editarUsuario.php?ok=2'.$_POST['id']);
}

?>