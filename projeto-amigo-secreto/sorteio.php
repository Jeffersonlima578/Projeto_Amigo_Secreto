
<?php
// incluindo conexão ao banco
include 'conexao.php';

//query para selecionas todos os registros da tabela
$sql = $pdo->prepare('SELECT * FROM amigo_secreto');
$sql->execute();

//função para selecionar todos os campos da tabela
$registros = $sql->fetchAll();

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
    <a class="navbar-brand" href="#">Sorteio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<img style="margin-left: 400px;" width="40%" height="120" src="img/Untitled-1.jpg"/>
</header>

<?php

//array onde vai armezenar os nomes vindo da tabela amigo_secreto
$nomes = [];

//laço de repetição foreach para armezenar todos os dados do campo nome que vem do banco de dados na row['nome'] no array nomes[]
foreach ($registros as $row) {
    $nomes[] = $row['nome'];
}

//shuffle faz o array nomes[] ficar em um ordem aleatória
shuffle($nomes);

//variavel totalNomes com a função count para contar todos os nomes do array nomes[]
$totalNomes = count($nomes);

//laço de repetição for para fazer o sorteio do amigo secreto
for ($i = 0; $i < $totalNomes; $i += 2) {
    $nome1 = $nomes[$i];
    $nome2 = $nomes[($i + 1) % $totalNomes];
    
    // Mostrando os dados
    
    print"
    <div class='card bg-dark text-white centro-div' style='width: 18rem;'>
  <div class='card-header'>
    Soreteio amigo secreto
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>$nome1 (Tirou) </li>
    <li class='list-group-item'>$nome2</li>
  </ul>
</div>
    
    ";
    
    //echo $nome1.' Tirou '.$nome2.'<br>';
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

