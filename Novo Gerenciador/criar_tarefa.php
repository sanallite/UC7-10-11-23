<?php
    session_start();
    require "conexao.php";

    if ( isset($_SESSION) && $_SERVER["REQUEST_METHOD"] == "POST" ) {
        $nome_tarefa = $_POST["nome_tarefa"];
        $descricao = $_POST["descricao_tarefa"];
        $data_hora_realizacao = $_POST["data_tarefa"];
        $local_tarefa = $_POST["local_tarefa"];
        $usuario = $_SESSION['id_usuario'];

        // Verifica se todos os campos foram preenchidos.
        if ( !empty( $nome_tarefa ) && !empty( $descricao ) && !empty( $data_hora_realizacao ) && !empty( $local_tarefa ) ) {
            // Insere os dados no banco de dados
            @$tarefa_criada = mysqli_query( $conexao, "INSERT INTO `tarefas`(`id_tarefas`, `nome_tarefa`, `id_usuario`, `descricao`, `data_hora`, `local`)
            VALUES (default, '$nome_tarefa', '$usuario', '$descricao', '$data_hora_realizacao', '$local_tarefa')" );

        }

        if ( $tarefa_criada ) {
            // echo "Tarefa criada com sucesso!";
            header ( "location:index.php?tarefa_criada=true" );
        }

        else {
            // echo "Erro ao criar a tarefa: ";
            header ( "location:index.php?tarefa_criada=false" );
        }
    }

    else {
        // Fecha a conexão com o banco de dados.
        $conexao -> close();

        echo "Nada para exibir.";
    }
?>
