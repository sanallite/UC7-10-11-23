
<?php

$id=$_GET['id'];
include("conecta.php");
$query="SELECT * FROM `usuarios` WHERE `id_usuario`=$id";
$sql = mysqli_query($conexao,$query);
$item= mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Usuários</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="formulario">
        <form method="POST" action="">
            <h1>Alteração de usuários</h1>
            <label>
                Nome:<br><input type="text" name="nome" 
                value="<?=$item['nome']?>">
            </label>
            <label>
                E-mail:<br><input type="email" name="email"
                value="<?=$item['email']?>">
            </label>
            <label>
                Senha:<br><input type="password" name="senha"
                value="<?=$item['senha']?>">
            </label>
            <label>
                Telefone:<br><input type="text" name="telefone"
                value="<?=$item['telefone']?>">
            </label>
            <label>
                Endereço:<br><input type="text" name="endereco"
                value="<?=$item['endereco']?>">
            </label>
            <label> Cidade:<br><input type="text" name="cidade"
            value="<?=$item['cidade']?>"></label>
            <label> Estado:<br>
            <input type="text" id="estado" name="estado"value="<?=$item['estado']?>">                
            </label>
            <label> Cep:<br><input type="text" name="cep"value="<?=$item['cep']?>"></label>

            <input type="submit" value="Alterar">
        </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
// criptografando a senha.
 

// nesse IF foi testado se existe dados repassados pelo metodo POST
// ENTÃO havendo dados repassado pelo metodo post, serão repassados,para as variáveis. 
// a partir daqui, utilizamos o comando SQL para alterar(update)
$query_update = "UPDATE `usuarios` SET `nome`='$nome',
`email`='$email',
`telefone`='$telefone',
`endereco`='$endereco',
`cidade`='$cidade',
`estado`='$estado',
`cep`='$cep' WHERE `id_usuario`=$id";
     //execução da alteração
$resultado_update = mysqli_query($conexao, $query_update);

if($resultado_update){
header("Location: sucesso.php?mensagem=ok");
    exit();
}else{
echo "Erro ao atualizar os dados: ".mysqli_error($conexao);
exit();
}

}
?>