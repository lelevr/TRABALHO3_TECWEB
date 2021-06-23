<?php
session_start();
require_once("Banco.php");
require_once("usuario.php");

if (! isset($_SESSION["autenticado"])){
    
    header('Location: http://localhost/projetos/');
}

if (! isset($_GET["id"])) {
    echo '<div class="alert alert-danger" role="alert">
    Falta o id do usuario.
        </div>'; 
    die();
}

$pdo = new Banco();

$usuario = new Usuario();
$row = [];
foreach($pdo->query($usuario->getSelectById($_GET["id"])) as $row) {
}

?>

<!doctype html>
<html lang="br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <title>Tela de cadastro de usuarios</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    
    <div class="container">
        
        <?php
        if (count($row) == 0 ){
            echo '<div class="alert alert-danger" role="alert">
            Este id não existe.
                </div>'; 
            die();
        }
        // var_dump($row);die();
        ?>
        <h1>Usuários cadastrados </h1>
        <br><br>
        
        <?php
          if (isset($_GET['ok'])) {
            if ($_GET['ok']==1) {
              echo '<div class="alert alert-primary" role="alert">
                      Alterado com sucesso !!!
                    </div>';
            }else if ($_GET['ok']==2) {
              echo '<div class="alert alert-danger" role="alert">
                    Ocorreu um erro.
            </div>'; 
            }
          }
        
        echo '
        <form action="alterar.php" method="post">
        <input type="hidden" name="id" value="'.$row['id'].'" >
        
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="text" class="form-control" id="exampleFormControlInput1"
               name="email" value="'.$row['email'].'"
              >
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Senha</label>
              <input type="text" class="form-control" id="exampleFormControlInput1"
              name="senha" value="'.$row['senha'].'"
            </div>
             
            <input type="submit" value="Salvar" class="btn btn-success" role="button">
        </form>
        ';

        ?>
    

    <br><br>
    </div>

    <script>
        
    </script>
  </body>
</html>
