<?php
    session_start();
    require "conexao.php";

    if ( isset($_SESSION) && isset($_GET['acao']) && isset($_GET['id']) ) {
        $usuario = $_SESSION['id_usuario'];

        if ( $_GET['acao'] == 'editarT' ) {
            $id_tarefa_selecionada = $_GET['id'];

            if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
                $novo_nome_tarefa = $_POST['novoNomeTarefa'];
                $nova_descricao = $_POST['novaDescricao'];
                $nova_data = $_POST['novaData'];
                $novo_local = $_POST['novoLocal'];

                if ( !empty($novo_nome_tarefa) ) {
                    $tarefa_editada = $conexao -> query ("UPDATE tarefas SET nome_tarefa = '$novo_nome_tarefa', descricao = '$nova_descricao', data_hora = '$nova_data', local = '$novo_local' WHERE id_tarefas = $id_tarefa_selecionada AND id_usuario = $usuario");

                    if ( $tarefa_editada ) {
                        header ("location:index.php?tarefa_editada=true");
                    }

                    else {
                        header ("location:index.php?tarefa_editada=false");
                    }
                }

                else {
                    header ("location:index.php?tarefa_editada=false");
                }
            }
        }

        else if ( $_GET['acao'] == 'editarC' ) {
            $id_contato_selecionado = $_GET['id'];

            if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
                $novo_nome_contato = $_POST['novoNomeContato'];
                $novo_telefone = $_POST['novoTelefone'];
                $novo_email = $_POST['novoEmail'];
                $novo_link = $_POST['novoLink'];
                $nova_rua = $_POST['novaRua'];
                $nova_cidade = $_POST['novaCidade'];
                $novo_estado = $_POST['novoEstado'];
                $novo_cep = $_POST['novoCep'];

                if ( !empty($novo_nome_contato) ) {
                    $contato_editado = $conexao -> query ("UPDATE contatos SET nome_contato = '$novo_nome_contato', telefone = '$novo_telefone', email = '$novo_email', link_site = '$novo_link', rua = '$nova_rua', cidade = '$nova_cidade', estado = '$novo_estado', cep = $novo_cep WHERE id_contato = $id_contato_selecionado AND id_usuario = $usuario");

                    if ( $contato_editado ) {
                        header ("location:index.php?contato_editado=true");
                    }

                    else {
                        header ("location:index.php?contato_editado=false");
                    }
                }

                else {
                    header ("location:index.php?contato_editado=false");
                }
            }
        }
    }

    else {
        echo "Nada para exibir.";
    }
?>
