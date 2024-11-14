<?php

include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = conectarDB();

    $stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    header('Location: index.php');
    exit;
} else {
    
    header('Location: index.php');
    exit;
}
?>