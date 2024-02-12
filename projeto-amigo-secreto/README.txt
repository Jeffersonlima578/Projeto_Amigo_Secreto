

Projeto Amigo Secreto 



Desafio proposto 


   Objetivo:
     Criar um sistema simples que faça um sorteio de amigo secreto.
     Pré-requisitos tecnológicos:
     Linguagem: PHP
     Banco de Dados: MySQL
     Paradigma: Orientação a objetos 
     Frontend: HTML5, CSS3

    
       1. Home
         a. A home do sistema será a listagem de pessoas;b. A home deverá ter um botão para cadastro de pessoas;
         c. Também deverá ter um campo de busca;
         d. Lista das pessoas

          2. Cadastro de pessoas:
             a. Tela para cadastro de pessoas com os campos de nome e email;
             b. Todos os campos são obrigatórios e o email deve ser válido eúnico;
             c. O botão de salvar só será habilitado se os campos forem válidos;
             d. Ao clicar em salvar:
             ■ Em caso de sucesso deve-se exibir uma mensagem desucesso e redirecionar para a tela de listagem deusuários;
             ■ Em caso de erro deve-se exibir a mensagem de erro e retornar para a tela de cadastro contendo os dados anteriormente digitados.

       3. Edição de pessoas:
          a. Haverá uma listagem de pessoas com nome e email na home;
          b. Ao clicar na linha contendo o nome da pessoa, redirecione para
          a tela de cadastro de pessoa. Os dados do registro selecionados deverão estar preenchidos nos campos;
          c. Os requisitos do cadastro continuam valendo na edição.

          4. Busca de pessoas:
             a. No campo de busca deve ser possível pesquisar pelo nome da pessoa ou email.

       5. Deleção de pessoas:
          a. Haverá, ao lado de cada registro da listagem, um botão de deleção;
          b. Ao clicar no botão uma mensagem solicitando a confirmação da deleção deverá aparecer. Caso seja confirmada a deleção devese excluir o registro do banco e atualizar a listagem.

           6. Sorteio:
             a. Haverá na home um botão para realizar sorteio;
             b. Ao clicar, cada pessoa cadastrada será relacionada a uma outra pessoa;
             c. Essa relação será exibida em uma outra tela contendo,

             por exemplo, os resultados:
             ■ Beatriz tirou o Caio;
             ■ Caio tirou João;
             ■ João tirou Fábio.

       7. Demais erros
         a. A mensagem de qualquer erro deve ser exibida na tela;







(  Comentarios de cada pagina  )


1. tela de cadastro.php 

a. incluindo conexão ao banco de dados
b. feito tela de cadastrada utilizando HTML, PHP e Bootstrap.
c. verificando se existe $_POST acao
d. Pegando os valores dos inputs 
e. variavel para validar o formulário
f. validando o campo nome empty para o campo não ser vazio e strstr para ter espaço e ser obrigatório nome completo
g. Tratativa do erro 
h. validando o campo email empty para o campo não ser vazio strlen para ter mais de 8 caracters strstr obrigatório de o @ de email
i. Tratativa de erro
j. Query para conferir se já existe uma pessoa com esse email || Query com segurança para evitar sql injections
k. função rowCount para verificar se for idêntico a 0 inserir o cadastro
l. variavel erro == 0 pode efetuar o cadastro
m. Query para inserir no banco de dados evitando sql injections
n. Tudo dando certo vai para página index onde fica os dados com a mensagem de sucesso
o. Tratativa de erro se já existe um email igual no banco de dados

Comentarios adicionados da pagina



2. conexao.php 
 
a. acesso ao banco de forma segura
b. fazendo conexão ao banco com pdo 
c. para mostrar erros do banco
d. capturando o erro de não acesso ao banco de dados

Comentarios adicionados na conexao.php  



3. editar.php 

a. incluindo conexão ao banco de dados
b. Recuperando o id que vem do campo que você quer editar
c. query para os dados que vem desse id
d. função para pegar todos os dados 
e. laço de repetição para recuperar os dados
f. <!-- recuperando o nome da tabela -->
g. <!-- recuperando o email da tabela -->
h. Pegando os valores dos inputs 
i. variavel para validar o formulário
j. validando o campo nome empty para o campo não ser vazio e strstr para ter espaço e ser obrigatório nome completo
k. Tratativa de erro
l. validando o campo email empty para o campo não ser vazio strlen para ter mais de 8 caracters strstr obrigatório de o @ de email
m. Tratativa de erro
n. Query para conferir se já existe uma pessoa com esse email || Query com segurança para evitar sql injections
o.função rowCount para verificar se for idêntico a 0 inserir o cadastro
p. variavel erro == 0 pode efetuar o cadastro
q. Query para update nos dados com segurança a slq injections
r. update com sucesso ir para index onde fica os dados com mensagem de atualização efetuada com sucesso


Comentarios adicionados na pagina editar.php 



4. enviar_email.php

a. Enviando email pelo phpmailer || chamando os arquivos necessários
b. chamando as classes e os namespaces
c. chamando a classe para execução
d. variaveis vindo do banco ao inserir 
e. tratativa para enviar o email
f. echo 'SMTP secure...<br/>';
g. endereço do email que vai enviar e mensagem
h. senha gerado do  email que vai enviar e mensagem
i. porta gemail
j. dporta gemail
k. email que vai receber a mensagem
l. array para execução
m. modelagem do email atraves do html
n. assunto do email
o. o que vai na mensagem do email
p. echo 'SMTP send...<br/>'; se de tudo certo será enviando
q. print "<script>alert('E-mail Enviado')</script>";
     print "<script>location.href= 'consulta_emprestimos.php'</script>";
     se não vai dar um erro
r. "<script>alert('E-mail não Enviado')</script>";
s. e pegaramos erro com catch

Comentarios adicionados na pagina enviar_email.php




5. index.php 

a. incluindo conexão ao banco de dados
b. fazendo o filtro para pesquisar na consulta aos dados
c. Query para pesquisa aos dados no caso escolhemos o campo nome da tabela para ser o parâmetro de pesquisa
d. função para pegar todos os dados 
e.  <!--Vindo valor da tela cadastro.php se inclusão for igual a 1 vai exibir a mensagem Pessoa cadastrada com sucesso-->
f. Atualizção da página após 5 segundo feito o cadastro para sumir a mensagem
g.  <!--Vindo valor da tela editar.php se inclusão for igual a 2 vai exibir a mensagem Pessoa Editado com sucesso -->
h.   Atualizção da página após 5 segundo feito a edição para sumir a mensagem
i. <!-- Vindo valor da tela cadastro se inclusão for igual a 3 vai exibir a mensagem Pessoa Deletado com sucesso -->
j.  Atualizção da página após 5 segundo feito a deleção para sumir a mensagem
k. <!--laço de repetição para recuperar os dados -->
l.  //colocando numa variavel para facilitar enviar o id para edição e delecão dos dados
m. <!--Mostrando os dados na tela -->
n. <!--butões para as ações de edição e deleção de dados -->
o. <!--container-->




6. limpar.php

a. //incluindo conexão ao banco de dados
b. //Recuperando o id que vem do campo que você quer editar
c. /query para os dados que vem desse id
d. //função para pegar todos os dados 
e. //laço de repetição para recuperar os dados
f.   //print $value['id'];
      //print $value['produto'];
      //print $value['marca']

g. <!-- recuperando o nome da tabela -->
h. <!-- recuperando o email da tabela -->
i. /deletando dados 
j. //verificando se existe $_POST acao
k. //recuperando a variavel id
l. //Query de deleção dos dados com segurança sql injections
m. //Deletando com sucesso vai para página index com a mesagem deletado com sucesso



7. Banco de dados modulo_8.sql




8.    sorteio.php

a. // incluindo conexão ao bacno
b. //query para selecionas todos os registros da tabela
c. //função para selecionar todos os campos da tabela
d. //array onde vai armezenar os nomes vindo da tabela amigo_secreto
e. //laço de repetição foreach para armezenar todos os dados do campo nome que vem do banco de dados na row['nome'] no array nomes[]
f. //shuffle faz o array nomes[] ficar em um ordem aleatória
g. //variavel totalNomes com a função count para contar todos os nomes do array nomes[]
h. /laço de repetição for para fazer o sorteio do amigo secreto
i.  // Mostrando os dados
j. //echo $nome1.' Tirou '.$nome2.'<br>'



Descrição do Projeto

1 - Feito pensamento logico como resolver e solucionar o problema, como fazer este desafio.
2 - foi feito Front-End utilizando PHP, HTML, CSS, JavaScript e Bootstrap, fazendo estilização e sendo responsivo.
3 - feito Back-End , utilizando Xampp e MySQL, fazendo os cadastro de nome, email e a logica do sorteio.