<?php
// Conectar ao banco de dados SQLite
$db = new SQLite3('sqlite/messages.db');

// Verificar se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $anonymous_name = $_POST["anonymous_name"];
    $community_message = $_POST["community_message"];

    // Preparar e executar a consulta SQL para inserir a mensagem na comunidade
    $stmt = $db->prepare('INSERT INTO community_messages (anonymous_name, message) VALUES (:anonymous_name, :message)');
    $stmt->bindValue(':anonymous_name', $anonymous_name, SQLITE3_TEXT);
    $stmt->bindValue(':message', $community_message, SQLITE3_TEXT);
    $stmt->execute();

    echo "Mensagem enviada para a comunidade com sucesso!";
}

// Fechar a conexão com o banco de dados SQLite
$db->close();
?>
