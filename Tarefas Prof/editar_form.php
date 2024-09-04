<?php
$id= $_GET['id'];
include("conecta.php");

$query = "SELECT * FROM usuarios WHERE 'id_usuario' = '$id'";
$sql = mysqli_query($conexao, $query);
$item = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="formulario">
        <form method="POST">
            <h1>Edição de usuários</h1>
            <label>
                Nome:<br><input type="text" name="nome" value="<?= $item['nome'] ?>">
            </label>
            <label>
                E-mail:<br><input type="email" name="email" value="<?= $item['email'] ?>">
            </label>
            <label>
                Telefone:<br><input type="text" name="telefone" value="<?= $item['telefone'] ?>">
            </label>
            <label>
                Endereço:<br><input type="text" name="endereco" value="<?= $item['rua'] ?>">
            </label>
            <label> Cidade:<br><input type="text" name="cidade" value="<?= $item['cidade'] ?>"></label>
            


            <label> Estado:
            <select id="estado" name="estado">

                <option value="<?= $item['estado'] ?>">Não alterar</option>
                <option value="Ac">Acre</option>
                <option value="Al">Alagoas</option>
                <option value="Ms">Mato Grosso do Sul</option>
                <option value="Mt">Mato Grosso</option>
                <option value="Pr">Paraná</option>
                <option value="Sc">Santa Catarina</option>
        
            </select>
            
            </label>
        


            <label> Cep:<br><input type="text" name="cep" value="<?= $item['cep'] ?>"></label>

            <input type="submit" value="Cadastrar">
        </form>
</body>
</html>