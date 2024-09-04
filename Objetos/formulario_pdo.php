<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <style>
        body {
            background-color: lightyellow;
        }
    </style>
</head>
<body>
    <h1>Formulário de Entrada Usando o PDO</h1>

    <h2>Cadastro</h2>

    <form action="consultar_adm.php" method="post">
        <p>
            <label for="adm">Nome do adminstrador:</label>
            <input type="text" name="adm" id="adm" required>
        </p>

        <p>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
        </p>

        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </p>

        <p>
            <input type="submit" value="Cadastrar">
        </p>
    </form>
</body>
</html>