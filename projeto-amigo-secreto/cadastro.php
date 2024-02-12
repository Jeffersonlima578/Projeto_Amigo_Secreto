<?php

//incluindo conexão ao banco de dados
include("conexao.php");



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Projeto Amigo secreto</title>
</head>
<body>
 
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Cadastro Pessoas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<br>

<div class="container">
<form method="post" action="">
  <div class="m-50">
    <label for="exampleInputEmail1" class="form-label">Nome:</label>
    <input type="text" class="form-control w-50"  name="nome">
    <div style="display: none; color: red;" id="mensagem-nome" class="form-text de">Nome não valido.</div>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">E-mail:</label>
    <input type="email" class="form-control w-50 " name="email">
    <div style="display: none; color: red;" id="email-error" class="form-text d1">E-mail não valido.</div>
  </div>
  <button type="submit" class="btn btn-primary" name="acao">Enviar</button>
</form>

<img width="600px" height="300px"src="img/pagina.png"/>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php

//verificando se existe $_POST acao
if (isset($_POST['acao'])) {
  
  //Pegando os valores dos inputs 
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  
  //variavel para validar o formulário
  $erro = 0;
   
  //validando o campo nome empty para o campo não ser vazio e strstr para ter espaço e ser obrigatório nome completo
  if (empty($nome) or strstr($nome, ' ') == false) {
    
    // Tratativa do erro 
    echo"
    <script>
    var mostrar = document.getElementById('mensagem-nome')
      mostrar.style.display = 'block'
      </script>
      ";
    $erro = 1;
}

//validando o campo email empty para o campo não ser vazio strlen para ter mais de 8 caracters strstr obrigatório de o @ de email
if(empty($email) || strlen($email) < 8 || strstr($email, '@') == FALSE) {
  //Tratativa de erro
  print"
  <script>
    var mostrar2 = document.getElementById('email-error');
    mostrar2.style.display = 'block';
  </script>
 ";
 $erro=1;
}

//Query para conferir se já existe uma pessoa com esse email 
//Query com segurança para evitar sql injections
$conferir = $pdo->prepare("SELECT * FROM amigo_secreto WHERE email = :email");
$conferir->bindValue(':email', $email);
$conferir->execute();

//função rowCount para verificar se for idêntico a 0 inserir o cadastro
if($conferir->rowCount()===0){

//variavel erro == 0 pode efetuar o cadastro
 if($erro == 0){
  
  //Query para inserir no banco de dados evitando sql injections
  $sql = $pdo->prepare("INSERT INTO amigo_secreto (nome, email) VALUES (?,?)");
  $sql->execute(array($nome, $email));
  //Tudo dando certo vai para página index onde fica os dados com a mensagem de sucesso
  include_once("enviar_email.php");
  header('location: index.php?inclusao=1');

}
}else{
  // Tratativa de erro se já existe um email igual no banco de dados
  print("<div class='alert alert-danger' role='alert'>
  Não foi possivel cadastrar verifique o erro que enviamos
</div>");
}
}

?>