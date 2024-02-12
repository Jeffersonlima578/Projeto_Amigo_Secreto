<?php 
//Enviando email pelo phpmailer

//chamando os arquivos necessários
require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
require_once('phpmailer/src/Exception.php');

//chamando as classes e os namespaces
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\SMTP;
use phpmailer\PHPMailer\Exception;

//chamando a classe para execução
$mail = new PHPMailer(true);

//variaveis vindo do banco ao inserir 
$nome = ($_POST['nome']); 
$email = ($_POST['email']); 



//tratativa para enviar o email
try {
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->SMTPSecure = "tls";
    //echo 'SMTP secure...<br/>';
    $mail->SMTPAuth = true;
    //endereço do email que vai enviar e mensagem
    $mail->Username = 'mdfconnection@gmail.com';
    //senha gerado do  email que vai enviar e mensagem
    $mail->Password = 'znekbkdkshnikiuq';
    //porta gemail
    $mail->Port = 587;
    //porta gemail
    $mail->CharSet = "UTF-8";
    //dporta gemail
    $mail->setFrom('mdfconnection@gmail.com');
    //email que vai receber a mensagem
    $mail->addAddress($email);
    //array para execução
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    //modelagem do email atraves do html
    $mail->isHTML(true);
    //assunto do email
    $mail->Subject = "Cadastrado com sucesso";
    //o que vai na mensagem do email
    $mail->Body = "nome = $nome, <br> 
     email = $email, <br> 
      ";
    
    $mail->AltBody = "cadastro_email";
    
//  echo 'SMTP send...<br/>';
    //se de tudo certo será enviando
    if($mail->send()) {
        //print "<script>alert('E-mail Enviado')</script>";
        //print "<script>location.href= 'consulta_emprestimos.php'</script>";
    //se não vai dar um erro
    } else {
        // "<script>alert('E-mail não Enviado')</script>";
    }
    // e pegaramos erro com catch
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}


