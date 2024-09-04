<?php
// Ainda não implementado.
    session_start();
    include "conexao.php";

    if ( $_SESSION && $conexao ) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Edição de Senha - Gerenciador de Tarefas</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="estilo.css">
        </head>

        <body>
            <h1><a href="index.php">Gerenciador de Tarefas</a></h1>

            <h3>Aqui você poderá editar a senha do seu usuário, e somente do seu usuário.</h3>

            <form method="post">
                <label for="encontrarU">Insira seu nome de usuário</label>
                <input type="text" value="" name="encontrarU">

                <input type="submit" value="Verificar">
            </form>

            <form method="post">
                <label for="senhaEditada">Insira uma nova senha para o seu usuário</label>
                <input type="password" name="senhaEditada">

                <input type="submit" value="Salvar nova senha">
            </form>
        </body>
    </html>
<?php }
    else {
        echo "Nada para exibir.";
    }
?>
