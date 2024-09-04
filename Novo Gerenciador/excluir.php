<?php
    session_start();

    require "conexao.php";

    if ( isset($_SESSION) && isset($_GET['acao']) && $conexao ) {
        $usuario = $_SESSION['id_usuario'];

        if ( $_GET['acao'] == 'excluirT' && isset($_POST['excluirT']) ) {
            if ( isset($_POST['selecionadas']) && is_array($_POST['selecionadas']) ) {
                foreach ( $_POST['selecionadas'] as $id_tarefa_selecionada ) {
                    $excluir = $conexao -> query ("DELETE FROM tarefas WHERE id_tarefas = $id_tarefa_selecionada AND id_usuario = $usuario");
                }

                if ( $excluir ) {
                    header ("location:index.php?tarefa_excluida=true");
                }

                else {
                    header ("location:index.php?tarefa_excluida=false");
                }
            }

            else {
                echo "Nada para exibir.";
            }
        }

        else if ( $_GET['acao'] == 'excluirC' && isset($_POST['excluirC']) ) {
            if ( isset($_POST['selecionados']) && is_array($_POST['selecionados']) ) {
                foreach ( $_POST['selecionados'] as $id_contato_selecionado ) {
                    $excluir = $conexao -> query ("DELETE FROM contatos WHERE id_contato = $id_contato_selecionado AND id_usuario = $usuario");
                }

                if ( $excluir ) {
                    header ("location:index.php?contato_excluido=true");
                }

                else {
                    header ("location:index.php?contato_excluido=false");
                }
            }

            else {
                echo "Nada para exibir.";
            }
        }

        else if ( $_GET['acao'] == 'excluirTodasT' && isset($_POST['excluirTodasT']) ) {
            $excluir = $conexao -> query ("DELETE FROM tarefas WHERE id_usuario = $usuario");

            if ( $excluir ) {
                header ("location:index.php?tarefa_excluida=todas");
            }

            else {
                header ("location:index.php?tarefa_excluida=nenhuma");
            }
        }

        else if ( $_GET['acao'] == 'excluirTodosC' && isset($_POST['excluirTodosC']) ) {
            $excluir = $conexao -> query ("DELETE FROM contatos WHERE id_usuario = $usuario");

            if ( $excluir ) {
                header ("location:index.php?contato_excluido=todos");
            }

            else {
                header ("location:index.php?contato_excluido=nenhum");
            }
        }
    }

    else {
        echo "Nada para exibir.";
    }
?>
