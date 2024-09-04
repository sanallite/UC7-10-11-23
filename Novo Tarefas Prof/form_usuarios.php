
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="formulario">
        <form method="POST" action="usuariocrud.php" enctype="multipart/form-data">
            <h1>Cadastro de usuários</h1>
            <label>
                Nome:<br><input type="text" name="nome">
            </label>
            <label>
                E-mail:<br><input type="email" name="email">
            </label>
            <label>
                Senha:<br><input type="password" name="senha">
            </label>
            <label>
                Telefone:<br><input type="text" name="telefone">
            </label>
            <label>
                Endereço:<br><input type="text" name="endereco">
            </label>
            <label> Cidade:<br><input type="text" name="cidade"></label>
            <label> Estado:
            <select id="estado" name="estado">

                <option value="">Selecione o Estado</option>
                <option value="Ac">Acre</option>
                <option value="Al">Alagoas</option>
                <option value="Ms">Mato Grosso do Sul</option>
                <option value="Mt">Mato Grosso</option>
                <option value="Pr">Paraná</option>
                <option value="Sc">Santa Catarina</option>
        
            </select>
            
            </label>
            <label> Cep:<br><input type="text" name="cep"></label>

            <input type="submit" value="Cadastrar">
        </form>
</body>
</html>