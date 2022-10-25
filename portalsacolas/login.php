<?php
  include 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="signin.css" rel="stylesheet">
  </head>
<body class="text-center">
  
    
    <main class="form-signin container2">
      <form method="post" action="">
        <img src="images/logo.png">
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="usuario" required>
          <label for="floatingInput">Usuário</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="senha" required>
          <label for="floatingPassword">Senha</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="entrar">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
    <?php
        if (isset($_POST['entrar'])){
          $sql = $conn->prepare("SELECT * FROM cadastro_usuarios WHERE usuario = ? AND senha = ?");
          $sql->execute(array($_POST['usuario'], $_POST['senha']));

          if($sql->rowCount()){
            $user = $sql->fetchAll(PDO::FETCH_ASSOC)[0];


           session_start();
           $_SESSION["usuario"] = array($user["nome"], $user["adm"]);
           echo "<script>window.location = 'painel.php'</script>";
          }else{
            echo "<script>window.location = 'login.php'</script>";
          }
           
        }else{
          
        }
          include 'footer.php';
     ?>



 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
