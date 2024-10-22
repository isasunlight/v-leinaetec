<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['anonymous_name'] ?: 'Anônimo';
    $message = $_POST['community_message'];

    // Carregar mensagens existentes
    $messages = file_get_contents('messages.json');
    $messages = $messages ? json_decode($messages, true) : [];

    // Adicionar nova mensagem
    $newMessage = [
        'name' => $name,
        'message' => $message,
    ];
    $messages[] = $newMessage;

    // Salvar mensagens atualizadas
    file_put_contents('messages.json', json_encode($messages));

    // Redirecionar de volta para a página de comunidade
    header('Location: comunidade.html');
    exit;
}
?>