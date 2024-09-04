<?php
    session_start();
    require "conexao.php";

    if ( isset($_SESSION) && isset($_GET['acao']) ) {
        if ( $_GET['acao'] == 'concluir' && isset($_POST['concluir']) && isset($_POST['selecionadas']) ) {

            $usuario = $_SESSION['id_usuario'];

            if ( isset($_POST['selecionadas']) && is_array($_POST['selecionadas']) ) {
                foreach ( $_POST['selecionadas'] as $id_tarefa_selecionada ) {
                    $concluir = $conexao -> query ("UPDATE tarefas SET conclusao = 'Concluída' WHERE id_tarefas = $id_tarefa_selecionada AND id_usuario = $usuario");
                }

                if ( $concluir ) {
                    header ( "location:index.php?conclusao=concluida" );
                }

                else {
                    header ( "location:index.php?conclusao=erro" );
                }
            }

            else {
                "A variável não foi definida.";
            }
        }

        else if ( $_GET['acao'] == 'concluirTodas' && isset($_POST['concluirTodas']) ) {
            $usuario = $_SESSION['id_usuario'];

            $concluir_todas = $conexao -> query ("UPDATE tarefas SET conclusao = 'Concluída' WHERE id_usuario = $usuario");

            if ( $concluir_todas ) {
                    header ( "location:index.php?conclusao=concluida" );
            }

            else {
                header ( "location:index.php?conclusao=erro" );
            }
        }

        else if ( $_GET['acao'] == 'cancelar' && isset($_POST['cancelar']) && isset($_POST['selecionadas']) ) {
            $usuario = $_SESSION['id_usuario'];

            if ( isset($_POST['selecionadas']) && is_array($_POST['selecionadas']) ) {
                foreach ( $_POST['selecionadas'] as $id_tarefa_selecionada ) {
                    $cancelar = $conexao -> query ("UPDATE tarefas SET conclusao = 'Cancelada' WHERE id_tarefas = $id_tarefa_selecionada AND id_usuario = $usuario");
                }

                if ( $cancelar ) {
                    header ( "location:index.php?conclusao=cancelada" );
                }

                else {
                    echo "Erro na edição da tarefa.";
                }
            }

            else {
                "A variável não foi definida.";
            }
        }

        else if ( $_GET['acao'] == 'cancelarTodas' && isset($_POST['cancelarTodas']) ) {
            $usuario = $_SESSION['id_usuario'];

            $cancelar_todas = $conexao -> query ("UPDATE tarefas SET conclusao = 'Cancelada' WHERE id_usuario = $usuario");

            if ( $cancelar_todas ) {
                    header ( "location:index.php?conclusao=cancelada" );
            }

            else {
                header ( "location:index.php?conclusao=erro" );
            }
        }

        else {
            echo "Nada para exibir.";
        }
    }

    else {
        echo "Nada para exibir.";
    }
?>
