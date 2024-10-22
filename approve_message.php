<?php
// Verificar se o email que acessa é o permitido
if ($_POST['email'] == 'projetovoleietec@outlook.com') {
    // Conexão com o banco de dados SQLite
    $db = new SQLite3('sqlite/messages.db');

    // Obter o ID da mensagem a ser aprovada
    $message_id = $_POST['message_id'];

    // Atualizar o status da mensagem para aprovada
    $stmt = $db->prepare('UPDATE messages SET approved = 1 WHERE id = :id');
    $stmt->bindValue(':id', $message_id, SQLITE3_INTEGER);
    $stmt->execute();

    echo "Mensagem aprovada com sucesso.";
    
    // Fechar a conexão com o banco de dados SQLite
    $db->close();
} else {
    echo "Você não tem permissão para realizar esta ação.";
}
?>
