<?php
        $id = $_GET['id'];
        include('conecta.php');
        $query = "SELECT * FROM `usuarios` WHERE `id_usuario`=$id";
        $sql = mysqli_query($conexao, $query);
        $item = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de usuários</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="formulario">
        <form action="" method="POST">
            <h1>Cadastro de usuários</h1>
            <label>
                Nomes:<br><input type="text" name="nome"value="<?=$item["nome"]?>">
            </label>
            <label>
                E-mail:<br><input type="email" name="email" value="<?=$item["email"]?>">
            </label>
            <label>
                Telefone:<br><input type="text" name="telefone"value="<?=$item["telefone"]?>">
            </label>
            <label>
                Endereço:<br><input type="text" name="endereco" value="<?=$item["endereco"]?>">
            </label>
            <label> Cidade:<br><input type="text" name="cidade" value="<?=$item["cidade"]?>"></label>
            <label> Estado:<br><input type="text" name="estado"value="<?=$item["estado"]?>""></label>
            <label> Cep:<br><input type="text" name="cep"value="<?=$item["cep"]?>"></label>

            <input type="submit" value="Cadastrar">
        </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        // Query de atualização
        $query_update = "UPDATE `usuarios` SET 
                         `nome`='$nome', 
                         `email`='$email', 
                         `telefone`='$telefone', 
                         `endereco`='$endereco', 
                         `cidade`='$cidade', 
                         `estado`='$estado', 
                         `cep`='$cep' 
                         WHERE `id_usuario`=$id";

        
    }
?>