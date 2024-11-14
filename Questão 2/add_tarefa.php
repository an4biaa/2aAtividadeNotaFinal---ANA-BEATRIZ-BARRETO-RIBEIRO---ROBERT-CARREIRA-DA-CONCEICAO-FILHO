<?php

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $data_vencimento = $_POST['data_vencimento'];

    $db = conectarDB();

    $stmt = $db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (:descricao, :data_vencimento)");
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':data_vencimento', $data_vencimento, SQLITE3_TEXT);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>