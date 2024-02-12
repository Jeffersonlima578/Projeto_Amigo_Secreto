<?php 
//incluindo conexão ao banco de dados
include_once("conexao.php");
//Recuperando o id que vem do campo que você quer editar
$id = $_GET['id']  ?? '';
//query para os dados que vem desse id
$sql = $pdo->prepare("SELECT * FROM amigo_secreto WHERE id = ?");

$sql->execute(array($id));
//função para pegar todos os dados 
$consulta = $sql->fetchAll();
//laço de repetição para recuperar os dados
foreach ($consulta as $key) {
      //print $value['id'];
      //print $value['produto'];
      //print $value['marca'];
}

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
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro Pessoas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<br><br>


<div class="container">
    <h2>Quer mesmo deletar ?</h2>
<form method="post" action="">
  <div class="m-50">
    <label for="exampleInputEmail1" class="form-label">Nome:</label><!-- recuperando o nome da tabela -->
    <input type="text" class="form-control w-50"  name="nome" value="<?php print($key['nome']); ?>">
    <div style="display: none; color: red;" id="mensagem-nome" class="form-text de">Nome não valido.</div>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">E-mail:</label><!-- recuperando o email da tabela -->
    <input type="email" class="form-control w-50 " name="email" value="<?php print($key['email']); ?>">
    <div style="display: none; color: red;" id="email-error" class="form-text d1">E-mail não valido.</div>
  </div>
  <button type="submit" class="btn btn-danger" name="acao">Deletar</button>
  <button><a href="index.php" class="btn btn-primary">Voltar</a></button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php


//deletando dados 

//verificando se existe $_POST acao
if(isset($_POST['acao'])){
    //recuperando a variavel id
    $id = $key['id'];
    
    //Query de deleção dos dados com segurança sql injections
    $sql = $pdo->prepare("DELETE FROM amigo_secreto WHERE id = ?");
    $sql->execute(array($id));
    //Deletando com sucesso vai para página index com a mesagem deletado com sucesso
    header('location: index.php?inclusao=3');

}
?>