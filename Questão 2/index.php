<?php
include 'database.php';

$db = conectarDB();

$query = "SELECT * FROM tarefas ORDER BY concluida, data_vencimento";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 2</title>
</head>
<style>
    body {
        font-family: helvetica, sans-serif;
        background-color: ghostwhite;
        text-align: center
    }
    input[type="text"] {
    padding: 3px;
    border: 1px solid lightgray;
    border-radius: 3px;
    width: 20%;
    }
    input[type="date"] {
    padding: 3px;
    border: 1px solid lightgray;
    border-radius: 3px;
    width: 15%;
    }
    button, a {
        background-color: #907AD6;
        color: white;
        border: none;
        padding: 3px 3px;
        text-decoration: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
    }
    h1, h2{
        text-align: center;
        font-family: helvetica;
        color: #4F518C;
        font-size: 23px;
    }
</style>
<body>
    <h1>Lista de Tarefas</h1>

    <form action="add_tarefa.php" method="POST">
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required><br>
        <label for="data_vencimento">Data de Vencimento:</label>
        <input type="date" id="data_vencimento" name="data_vencimento" required><br>
        <button type="submit">Adicionar Tarefa</button>
    </form>

    <h2>Tarefas Não Concluídas</h2>
    <ul>
        <?php while ($row = $result->fetchArray()): ?>
            <?php if ($row['concluida'] == 0): ?> <br>
                <li>
                    <?php echo $row['descricao']; ?> (<?php echo $row['data_vencimento']; ?>)
                    <a href="update_tarefa.php?id=<?php echo $row['id']; ?>">[Marcar como concluída]</a>
                    <a href="delete_tarefa.php?id=<?php echo $row['id']; ?>">[Excluir]</a>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>

    <h2>Tarefas Concluídas</h2>
    <ul>
        <?php
        $result = $db->query($query);
        while ($row = $result->fetchArray()):
            if ($row['concluida'] == 1):
        ?>
                <li>
                    <?php echo $row['descricao']; ?> (<?php echo $row['data_vencimento']; ?>) 
                    <a href="delete_tarefa.php?id=<?php echo $row['id']; ?>">[Excluir]</a>
                </li>
        <?php
            endif;
        endwhile;
        ?>
    </ul>
</body>
</html>