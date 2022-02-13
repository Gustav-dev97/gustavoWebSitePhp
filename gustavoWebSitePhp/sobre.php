<?php 

use PHPMailer\PHPMailer\PHPMailer;

/* 
* IMPORTANTE: Para usar a funcionalidade de enviar as informações por e-mail é necessário 
* ativar a opção 'Acesso a app menos seguro' em sua conta google, para isso basta ir em:
*
*  -> Conta/Segurança/Acesso a app menos seguro  
*
* E marcar a opção como ativado (Permitir aplicativos menos seguros: ATIVADA)
*
* Também é necessário substituir os campos abaixo com o seu email e senha de login: 
*
*   $mail->Username = "seu.email@gmail.com";
*   $mail->Password =  "SuaSenha";
*   $mail->addAddress("seu.email@gmail.com");
*
*/

 // Retorna as informacoes do 'form' 
 if(isset($_POST['nome']) && (isset($_POST['email']))){  
    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $assunto = $_POST['assunto'];
    $mensagem= $_POST['mensagem'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //Configuracoes do SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "seu.email@gmail.com";
    $mail->Password = "SuaSenha";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Configuracoes do e-mail
    $mail->isHTML(true);
    $mail->setFrom($email, $nome);
    $mail->addAddress("seu.email@gmail.com");
    $mail->Subject = ("$email ($assunto)");
    $mail->Body = ("Telefone: $telefone <br><br> ($mensagem)");

    if($mail->send()){
        $status = "Sucesso";
        $resposta = "Email Enviado!";
    } else{
        $status = "Falhou";
        $resposta = "Nao foi possivel enviar o e-mail" .$mail->ErrorInfo;
    }
    //Checar envio do email
    //exit(json_encode(array("status" => $status , "resposta" => $resposta)));

    /* 
    * Estabelece uma conexao com o banco de dados
    *
    */
    $conexao = mysqli_connect('localhost', 'root');

    // Retornar se a conexao foi feita com sucesso
    if($conexao){
        echo "Conexão feita com sucesso!";
    } else{
        echo "Conexão falhou!";
    }

    // Selects the default database for database queries
    mysqli_select_db($conexao, 'gustavowebsite');

    /* 
    * Como a informacao esta vindo de um 'form' para ser 
    * inserido em uma tabela um 'query' é necessário com
    * o INSERT:
    *
    * INSERT INTO usuarios (banco de dados) 
    * VALUES (variaveis acima como string)"
    *
    */ 
    $query = "INSERT INTO usuarios (nome, email, telefone, assunto, mensagem) VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem')";

    /* 
    * Checar se esta funcionando e enviar o usuário de 
    * volta para a pagina index na section #contato (caso contrario ele será 
    * redirecionado para outra pagina que exibe se a conexao foi feita com sucesso)
    */
    mysqli_query($conexao, $query);
    sleep(3);
    header('location:index.html', true, 303);
    exit;

}    
?>