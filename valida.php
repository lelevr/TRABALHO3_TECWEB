<?php
session_start();

require_once("Banco.php");

$email = $_GET['email'];
$senha = $_GET['senha'];

$pdo =  new Banco();

//
//NAO FACA ISSO EM PRODUCAO DEVIDO AO ATAQUE DE SQL INJECTION
//
$sql = "SELECT * from usuarios where email ='$email' and senha ='$senha' ";
$result = $pdo->query($sql);


if (empty($result->rowCount())) {
    unset($_SESSION["autenticado"]);
   header('Location: http://localhost/projetos/');
}else{
    $_SESSION["autenticado"]=true;
     header('Location: http://localhost/projetos/menu.php');
}

/*
if ($email == 'adm@linux.net' && $senha=="123") {
    
    header('Location: http://localhost/20211/menu.php');
}else{
    $_SESSION["autenticado"]=false;
    // echo "<br>login e senha inválidos";
    header('Location: http://localhost/20211/index.html');
}
*/
?>