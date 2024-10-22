<?php
// Inclua os arquivos do PHPMailer que você baixou
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'caminho/para/PHPMailer/src/Exception.php';
require 'caminho/para/PHPMailer/src/PHPMailer.php';
require 'caminho/para/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP do Outlook (Hotmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'projetovoleietec@gmail.com'; // Seu endereço de email do Outlook (Hotmail)
        $mail->Password = 'volei2024'; // Sua senha do Outlook (Hotmail)
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom($email, $name);
        $mail->addAddress('projetovoleietec@gmail.com');

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Nova Mensagem de Contato';
        $mail->Body = "<h2>Nova Mensagem de Contato</h2><p><strong>Nome:</strong> $name</p><p><strong>Email:</strong> $email</p><p><strong>Mensagem:</strong><br>$message</p>";

        // Enviar email
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Houve um erro ao enviar sua mensagem. Detalhes do erro: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
