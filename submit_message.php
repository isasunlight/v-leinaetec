<?php
// Conectar ao banco de dados SQLite
$db = new SQLite3('sqlite/messages.db');

// Verificar se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Preparar e executar a consulta SQL para inserir a mensagem
    $stmt = $db->prepare('INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':message', $message, SQLITE3_TEXT);
    $stmt->execute();

    echo "Mensagem enviada com sucesso! Aguarde a aprovação.";
}

// Fechar a conexão com o banco de dados SQLite
$db->close();
?>
