<?php
    $conexao = mysqli_connect(
        'localhost','root', '', 'novo_gerenciador'
    );

    if ( $conexao ) {
        // Não exibir nada.
    }

    else {
        echo "Erro na conexão.".mysqli_connect_error();
    }
?>
