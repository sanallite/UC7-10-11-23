<?php
$host="localhost";
$usuario="root";
$senha="";
$nomedobanco="gerenciador_tarefas_prof";

$conexao=mysqli_connect($host,$usuario,$senha,$nomedobanco);
if($conexao){
    echo("");
}else{
    echo("Erro na conexão!");
}

?>