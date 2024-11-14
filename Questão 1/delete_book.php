<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = getDatabaseConnection();

    $stmt = $db->prepare('DELETE FROM livros WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    header('Location: index.php');
}
?>
