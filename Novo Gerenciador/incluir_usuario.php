<?php
    require "conexao.php";
    session_start();

    if ( $_SESSION && $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $nome_usuario = $_POST['novoNomeU'];

        $senha_escolhida = $_POST['novaSenha'];
        $senha_criptografada = password_hash($senha_escolhida, PASSWORD_DEFAULT);

        $incluir_usuario = $conexao -> query("INSERT INTO usuarios (nome_usuario, senha) VALUES ('$nome_usuario', '$senha_criptografada')");

        if ( $incluir_usuario ) {
            session_start();
            $_SESSION['usuario'] = $nome_usuario;

            header ( "location:login.php?incluido=true" );
        }
    }

    else {
        echo "Nada para exibir.";
    }
?>
