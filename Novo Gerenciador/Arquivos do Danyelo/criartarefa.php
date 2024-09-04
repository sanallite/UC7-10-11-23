<?php
require "conecta.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_tarefa = $_POST["nome_tarefa"];
    $descricao = $_POST["descricao_tarefa"];
    $data_hora_realizacao = $_POST["data_tarefa"];
    $local_tarefa = $_POST["local_tarefa"];

    // Verifica se todos os campos foram preenchidos
    if (!empty($nome_tarefa) && !empty($descricao) && !empty($data_hora_realizacao) && !empty($local_tarefa)) {
        // Insere os dados no banco de dados
       mysqli_query($conexao, "INSERT INTO `tarefas`(`id_tarefas`, `nome`, `descricao`, `data e hora`, `local`) VALUES (default, '$nome_tarefa', '$descricao', '$data_hora_realizacao', '$local_tarefa')");

        if ($conexao) {
            echo "Tarefa criada com sucesso!";
        } else {
            echo "Erro ao criar a tarefa: ";
        }
    } else {
        // Algum campo não foi preenchido, exibe uma mensagem de erro
        echo "Por favor, preencha todos os campos!";
    }
}
    // Fecha a conexão com o banco de dados
    $conexao->close();
?>
