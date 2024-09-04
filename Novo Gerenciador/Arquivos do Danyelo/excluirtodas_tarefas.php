<?php
session_start();

require "conexao.php";

$excluirTarefas = "DELETE FROM tarefas";
if (mysqli_query($conexao, $excluirTarefas)){
    header ("location:index.php?tarefas_excluidas=true");
}else {
    header ("location:index.php?tarefas_excluidas=false");
}
?>