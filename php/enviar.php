<?php


echo '<pre>';
print_r($_POST);
echo '</pre>';

// destinatario
$destinatario = "jonathandsb20@gmail.com";
error_log(var_export($_POST, true), 3, './test.log');

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];

// validação 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Email inválido!";
  exit;
}

// Montando a mensagem do email
$assunto = "Contato pelo site";
$corpo = "Nome: $nome\nEmail: $email\nMensagem: $mensagem";

// Enviando o email
$enviado = mail($destinatario, $assunto, $corpo);

// Exibindo mensagem de sucesso ou erro
if ($enviado) {
  echo "Mensagem enviada com sucesso!";
} else {
  echo "Erro ao enviar a mensagem. Tente novamente mais tarde.";
}

?>