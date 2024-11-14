<?php
include('database.php');

// Função para listar livros
function listarLivros() {
    $db = getDatabaseConnection();
    $result = $db->query('SELECT * FROM livros');

    $livros = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $livros[] = $row;
    }

    return $livros;
}

$livros = listarLivros();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 1</title>
</head>
<style>
    body {
        background-color: ghostwhite;
        text-align: center;
    }
    h1 {
        text-align: center;
        font-family: helvetica;
        font-size: 20px;
        margin: 0;
        color: #82667F;
    }
    h2 {
        text-align: center;
        font-family: helvetica;
        font-size: 20px;
        color: #82667F;
    }
    table {
        text-align: center;
        margin: auto;
    }
</style>
<body>
    <h1>Livros Cadastrados</h1>

    <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#DD9AC2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['ano_publicacao']; ?></td>
                    <td>
                        <a href="delete_book.php?id=<?php echo $livro['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Adicionar Novo Livro</h2>
    <form action="add_book.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required><br><br>

        <label for="ano_publicacao">Ano de Publicação:</label>
        <input type="number" name="ano_publicacao" required><br><br>

        <input type="submit" value="Adicionar Livro">
    </form>
</body>
</html>