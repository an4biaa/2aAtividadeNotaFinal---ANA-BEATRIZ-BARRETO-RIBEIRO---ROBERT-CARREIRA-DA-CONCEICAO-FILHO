<?php

function conectarDB() {
    
    $db = new SQLite3('tarefas.db');
    if (!$db) {
        die("Falha na conexão com o banco de dados.");
    }

    $db->exec("CREATE TABLE IF NOT EXISTS tarefas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        descricao TEXT NOT NULL,
        data_vencimento TEXT NOT NULL,
        concluida INTEGER DEFAULT 0
    )");

    return $db;
}
?>