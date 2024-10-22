<?php
// Conexão com o banco de dados SQLite
$db = new SQLite3('sqlite/messages.db');

// Consulta para buscar mensagens não aprovadas
$stmt = $db->prepare('SELECT * FROM messages WHERE approved = 0');
$result = $stmt->execute();

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
    echo "<p>" . htmlspecialchars($row['message']) . "</p>";
    echo "<small>Enviado por: " . htmlspecialchars($row['email']) . "</small>";
    echo "</div>";
}

$db->close();
?>
