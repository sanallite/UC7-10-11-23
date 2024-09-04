<?php
// Ainda não implementado.
    require "conexao.php";
    session_start();

    if ( $_SESSION ) {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gerenciador de Tarefas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <h1><a href="index.php">Exclusão de Usuário - Gerenciador de Tarefas</a></h1>

        <h3>Aqui você poderá remover seu cadastro nesse gerenciador, se tiver certeza da escolha.</h3>

        <form method="post">
            <p>Usuário:</p>

            <label>Insira sua senha:</label>
            <input type="password" name="senhaDigitada">

            <input type="submit" value="Apagar conta">
        </form>
    </body>
</html>
<?php }
    else {
        echo "Nada para exibir.";
    }
?>
