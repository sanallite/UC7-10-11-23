<?php
$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
$prazo=$_POST['prazo'];
$prioridade=$_POST['prioridade'];
if(isset($_POST['concluida'])){
    $concluida="sim";
}else{
    $concluida="não";
}
$responsavel=$_POST['usuario'];

include("conecta.php");

mysqli_query($conexao,"INSERT INTO `tarefas`(`id_tarefas`, `tarefa`, `descricao`, `prazo`, `prioridade`, `conclusao`, `id_usuario`) VALUES (default,'$nome','$descricao','$prazo','$prioridade','$concluida','$responsavel')");

?>