<?php
include('database.php');

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com o banco de dados
    $db = getDatabaseConnection();

    // Excluir o livro com o ID fornecido
    $stmt = $db->prepare('DELETE FROM livros WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    // Redirecionar para a página principal
    header('Location: index.php');
}
?>