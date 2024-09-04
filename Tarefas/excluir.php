<?php
require ("conectar.php");

if ( isset($_GET['acao']) && isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario']) ) {
    $acao = $_GET['acao'];
    $id_usuario = intval($_GET['id_usuario']);
    // O intval vai converter o ID em um número inteiro -- considerado parte inteira.

    if ( $acao === 'excluirUsuario' ) {
        mysqli_query($conexao,"DELETE FROM usuarios WHERE id = '$id_usuario'");

        header("location:tarefas_bd.php");
    }

    else {
        echo "Os dados enviados estão inválidos ou não existem, tente novamente.";
    }
}

else if ( isset($_GET['acao']) && isset($_GET['id_tarefa']) && is_numeric($_GET['id_tarefa']) ) {
    $acao = $_GET['acao'];
    $id_tarefa = intval($_GET['id_tarefa']);

    if ( $acao === 'excluirTarefa' ) {
        mysqli_query($conexao,"DELETE FROM tarefas WHERE id = '$id_tarefa'");

        header("location:tarefas_bd.php");
    }

    else {
        echo "Os dados enviados estão inválidos ou não existem, tente novamente.";
    }
}

else {
    echo "Nada para exibir.";
}