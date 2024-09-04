<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <form action="">
        <fieldset>
            <legend>Nova Tarefa</legend>

            <p class="texto">
                <label for="nome">Tarefa:</label>
                <input type="text" name="nome">
            </p>

            <p class="texto">
                <label for="desc">Descrição:</label>
                <textarea name="desc"></textarea>
            </p>

            <p class="texto">
                <label for="prazo">Prazo:</label>
                <input type="text" name="prazo">
            </p>

            <fieldset>
                <legend>Prioridade:</legend>

                <p>
                    <input type="radio" name="prioridade" value="Baixa" checked>
                    <label for="prioridade">Baixa</label>

                    <input type="radio" name="prioridade" value="Média">
                    <label for="prioridade">Média</label>

                    <input type="radio" name="prioridade" value="Alta">
                    <label for="prioridade">Alta</label>
                </p>

                <p>
                    <label for="concluida">Concluida?</label>
                    <input type="checkbox" name="concluida" value="Sim">
                </p>
            </fieldset>

            <p>
                <input type="submit" value="Cadastrar">
            </p>
        </fieldset>
    </form>

    <?php
        if ( array_key_exists('nome', $_GET) ) {
            $nova_tarefa = [
                'nome' => $_GET['nome'],
                'desc' => $_GET['desc'],
                'prazo' => $_GET['prazo'],
                'prioridade' => $_GET['prioridade'],
                'concluida' => isset( $_GET['concluida'] )?
                    $_GET['concluida']
                    : 'Não'
            ];

            $_SESSION['lista_tarefas'] []= $nova_tarefa;
            /* O posicionamento dessa variável no código é importante, se a linha acima estivesse antes da definição do vetor, apareceria um erro dizendo que a variável $nova_tarefa não foi definida, mesmo tendo dados carregados nela. 
                Esse comando irá adicionar ao final do vetor armazenado na sessão um novo item, no caso outro vetor, que representa uma nova tarefa.
            */
        }

        if ( array_key_exists('lista_tarefas', $_SESSION) ) {
            $lista_tarefas = $_SESSION['lista_tarefas'];
        }

        else {
            $lista_tarefas = [];
        }
    ?>

    <p>
        <?php
            var_dump($_SESSION['lista_tarefas']);
        ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluida</th>
            </tr>
        </thead>

        <tbody>
        <?php
            foreach( $lista_tarefas as $tarefa ): ?>
            <tr>
                <?php
                    if ( isset($tarefa['nome']) ) {
                ?>
                <td>
                    <?= $tarefa['nome']; ?>
                </td>
                <?php } ?>

                <?php
                    if ( isset($tarefa['desc']) ) {
                ?>
                <td>
                    <?= $tarefa['desc']; ?>
                </td>
                <?php } ?>

                <?php
                    if ( isset($tarefa['prazo']) ) {
                ?>
                <td>
                    <?= $tarefa['prazo']; ?>
                </td>
                <?php } ?>

                <?php
                    if ( isset($tarefa['prioridade']) ) {
                ?>
                <td>
                    <?= $tarefa['prioridade']; ?>
                </td>
                <?php } ?>

                <?php
                    if ( isset($tarefa['concluida']) ) {
                ?>
                <td>
                    <?= $tarefa['concluida']; ?>
                </td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>