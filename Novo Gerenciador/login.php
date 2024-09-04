<?php
    session_start();
    require "conexao.php";

    if ( isset($_SESSION['id_usuario']) ) {
        header ("location:index.php");
    }

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $nome_usuario = $_POST['nomeU'];
        $senha = $_POST['senha'];

        $lista_usuarios = mysqli_query($conexao, "SELECT * FROM usuarios");

        while ( $resultados = mysqli_fetch_assoc($lista_usuarios) ) {
            if ( $nome_usuario == $resultados['nome_usuario'] && password_verify($senha, $resultados['senha']) ) {
                $_SESSION['id_usuario'] = $resultados['id_usuario'];
                $_SESSION['usuario'] = $resultados['nome_usuario'];
                @$login_feito = true;
            }

            else {
                @$login_feito = false;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Entrada - Gerenciador de Tarefas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <h1>Gerenciador de Tarefas</h1>

        <h3>Organize suas tarefas de maneira fácil e prática.</h3>

        <?php
            if ( isset($login_feito) ) {
                if ( $login_feito == true ) {
                    header ( "location:index.php" );
                }

                else if ( $login_feito == false ) {
                    echo "<h3>Usuário não encontrado ou dados incorretos.</h3>";
                }
            }

            if ( isset($_GET['incluido']) ) {
                if ( isset($_SESSION['usuario']) ) {
                    echo "<h3>Usuário criado com sucesso! Faça o login para entrar no gerenciador.</h3>";
                }
            }
        ?>

        <input type="button" value="Cadastre-se para começar">
        <input type="button" value="Já é cadastrado? Entre agora">

        <h2>Cadastro</h2>

        <form method="post" action="incluir_usuario.php">
            <label for="novoNomeU">Crie um nome de usuário</label>
            <input type="text" name="novoNomeU">

            <label for="novaSenha">Crie uma senha</label>
            <input type="password" name="novaSenha">

            <input type="submit" value="Cadastrar">
        </form>

        <h2>Entrada</h2>

        <form method="post">
            <label for="nomeU">Nome de usuário:</label>
            <input type="text" name="nomeU">

            <label for="senha">Senha:</label>
            <input type="password" name="senha">

            <input type="submit" value="Entrar">
        </form>
    </body>
</html>
