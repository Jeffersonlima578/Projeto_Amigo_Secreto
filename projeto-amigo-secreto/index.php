<?php
//incluindo conexão ao banco de dados
include("conexao.php");

//fazendo o filtro para pesquisar na consulta aos dados
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

//Query para pesquisa aos dados no caso escolhemos o campo nome da tabela para ser o parâmetro de pesquisa
$sql = $pdo->prepare("SELECT * FROM amigo_secreto WHERE nome like '%$filtro%' ORDER BY id");
$sql->execute();

//função para pegar todos os dados 
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
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastro Pessoas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sorteio.php">Sorteio</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<br>
         <!--Vindo valor da tela cadastro.php se inclusão for igual a 1 vai exibir a mensagem Pessoa cadastrada com sucesso-->
        <?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Pessoa cadastrada com sucesso</h5>
		</div>
    <script>
      //Atualizção da página após 5 segundo feito o cadastro para sumir a mensagem
      setTimeout(() => {
        window.location.href ="index.php";
      }, 5000);
    </script>
		<?php } ?>
    
     <!--Vindo valor da tela editar.php se inclusão for igual a 2 vai exibir a mensagem Pessoa Editado com sucesso -->
    <?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>
		<div class="bg-info pt-2 text-white d-flex justify-content-center">
			<h5>Editado com sucesso</h5>
		</div>
    <script>
      //Atualizção da página após 5 segundo feito a edição para sumir a mensagem
      setTimeout(() => {
        window.location.href ="index.php";
      }, 5000);
    </script>
		<?php } ?>

     <!-- Vindo valor da tela cadastro se inclusão for igual a 3 vai exibir a mensagem Pessoa Deletado com sucesso -->
    <?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 3) { ?>
		<div class="bg-danger pt-2 text-white d-flex justify-content-center">
			<h5>Deletado com sucesso</h5>
		</div>
    <script>
      //Atualizção da página após 5 segundo feito a deleção para sumir a mensagem
      setTimeout(() => {
        window.location.href ="index.php";
      }, 5000);
    </script>
		<?php } ?>

<section>
      <h1>Consultas</h1> 

      <br><br>
      <br>


      <form method="GET" action="index.php">
        <p style="margin: 0 auto;">Filtrar por  Nome da Pessoa:</p> 
        <input class="centro" type="text" name="filtro" required autofocus>
        <input  type="submit" value="Pesquisar" class="btn btn-dark "> <img style="margin:0px;  margin-left: 650px"; width="15%" height="150px" src="img/OIP.jpg"/>
      </form>
</section>
<br>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Email:</th>
                <th>Editar:</th>
                <th>Deletar:</th>
            </tr>
        </thead>
        <tbody>

          <!--laço de repetição para recuperar os dados -->
          <?php foreach($registros as $key){ 
            //colocando numa variavel para facilitar enviar o id para edição e delecão dos dados
            $id = $key['id'];
            
            ?>
            <tr>
                <!--Mostrando os dados na tela -->
                <td><?php print($key['nome']); ?></td>
                <td><?php print($key['email']); ?></td>
                <!--butões para as ações de edição e deleção de dados -->
                <td><?php echo "<button  class = 'btn btn-success' onclick=\"location.href='editar.php?id=$id';\">Editar</button>"; ?></td>
                <td><?php echo "<button  class = 'btn btn-danger' onclick=\"location.href='limpar.php?id=$id';\">Deletar</button>"; ?></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div><!--container-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>