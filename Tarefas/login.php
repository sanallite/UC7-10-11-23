<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <h2>Entrada</h2>

    <form action="processa_login.php" method="post">
        <fieldset>
            <p class="texto">
                <label for="email">E-mail:</label>
                <input type="email" name="email" required>
            </p>

            <p class="texto">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
            </p>
        </fieldset>
        
        <p>
            <input type="submit" value="Entrar">
        </p>
    </form>
</body>
</html>