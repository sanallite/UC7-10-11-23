<?php
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $nome_banco = 'gerenciador_de_tarefas';

    $conexao = mysqli_connect($host, $usuario, $senha, $nome_banco);

    if ( $conexao ) {
        
    }

    else {
        echo "Erro na conexão.";
    }
?>