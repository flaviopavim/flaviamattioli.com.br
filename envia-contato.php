<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos necessários foram preenchidos
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        
        
        $name = empty($_POST['name'])?'Nome não informado':$_POST['name'];
        $email = empty($_POST['email'])?'Email não informado':$_POST['email'];
        $subject = empty($_POST['subject'])?'Contato no site':$_POST['subject'];
        $message = $_POST['message'];

        // Configuração do destinatário
        $to = "psiflaviamattioli@gmail.com";
//        $to = "kickonightmare@gmail.com";

        // Constrói o corpo da mensagem
        $email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n" .
            "Nome: $name\n" .
            "Email: $email\n" .
            "Assunto: $subject\n" .
            "Mensagem:\n$message\n";

        // Configurações adicionais
        $headers = "De: $name <$email>\r\n";
        $headers .= "Responder a: $email\r\n";

        // Envia o email
        if (mail($to, $subject, $email_body, $headers)) {
            // Exibe mensagem de sucesso em JavaScript e redireciona para a home
            echo "<script>alert('Mensagem enviada. Obrigada!'); window.location.href = './';</script>";
        } else {
            // Exibe mensagem de erro
            echo "<script>alert('Erro ao enviar mensagem. Por favor, tente novamente mais tarde.'); window.location.href = './';</script>";
        }
    } else {
        // Exibe mensagem de erro se campos estão faltando
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = './';</script>";
    }
} else {
    // Retorna página de erro se o método da requisição não for POST
    echo "<script>alert('Método de requisição inválido.'); window.location.href = './';</script>";
}