
<?php
include("classe_usuario.php");
if (isset($_GET['id'])){
    $usuario = new Usuario();
    $id_usuario = $_GET['id'];
    $item=$usuario->buscarUsuarioPorId($id_usuario);
    if($item){     

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
        <form method="POST" action="usuariocrud.php">
            <h1>Alteração de usuários</h1>

            <input type="hidden" name="opcao" value="2">
          <!--   Senhores o que faltou no nosso código era a referência para alteração, faltava o ID como referencia. -->
         <!--  adicionar ao formulário o id do usuario para que a comparação seja realizada.  -->    
            <label>
                id:<br><input type="text" name="id_usuario" 
                value="<?php echo $item['id_usuario']; ?>">
            </label>
         
            <label>
                Nome:<br><input type="text" name="nome" 
                value="<?php echo $item['nome'];?>">
            </label>
            <label>
                E-mail:<br><input type="email" name="email"
                value="<?php echo $item['email'];?>">
            </label>
            <label>
                Senha:<br><input type="password" name="senha"
                value="<?php echo $item['senha'];?>">
            </label>
            <label>
                Telefone:<br><input type="text" name="telefone"
                value="<?php echo $item['telefone'];?>">
            </label>
            <label>
                Endereço:<br><input type="text" name="endereco"
                value="<?php echo $item['endereco'];?>">
            </label>
            <label> Cidade:<br><input type="text" name="cidade"
            value="<?php echo $item['cidade'];?>"></label>
            <label> Estado:<br>
            <input type="text" id="estado" name="estado"value="<?php echo $item['estado'];?>">                
            </label>
            <label> Cep:<br><input type="text" name="cep"value="<?php echo $item['cep'];?>"></label>

            <input type="submit" value="Alterar">
        </form>
</body>
</html>
<?php
    }}
?>