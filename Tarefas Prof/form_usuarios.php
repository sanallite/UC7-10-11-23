
<?php
include("conecta.php");

if(isset($_FILES['arquivo'])){
    $arquivo=$_FILES['arquivo'];
    if($arquivo['error']){
        die("falha ao enviar o arquivo");
    }else{ 
        if($arquivo['size']>6000000){
            die("arquivo muito Grande!!! Max:6Mb");
        }
    }
    $pasta="fotos/";
    $nomedoarquivo=$arquivo['name'];
    $novoNomedoArquivo=uniqid();
    $extensao=strtolower(pathinfo($nomedoarquivo,PATHINFO_EXTENSION));

    if($extensao !="jpg" && $extensao !="png" && $extensao="jpeg")
        die("tipo de arquivo não é aceito");
    $deu_certo=move_uploaded_file($arquivo['tmp_name'],$pasta.$novoNomedoArquivo.".".$extensao);
    if($deu_certo){
        echo "<p>Arquivo enviado com sucesso!</p>";
    }
    }
@$nome=$_POST['nome'];
@$email=$_POST['email'];
@$telefone=$_POST['telefone'];
@$endereco=$_POST['endereco'];
@$cidade=$_POST['cidade'];
@$estado=$_POST['estado'];
@$cep=$_POST['cep'];
@$fotoUsuario = $novoNomedoArquivo.".".$extensao;

mysqli_query($conexao,"INSERT INTO `usuarios`(`id_usuario`, `nome`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `cep`, `foto`) VALUES (default,'$nome','$email','$telefone','$endereco','$cidade','$estado','$cep', '$fotoUsuario')");
?>

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
        <form method="POST" enctype="multipart/form-data">
            <h1>Cadastro de usuários</h1>
            <label>
                Nome:<br><input type="text" name="nome">
            </label>
            <label>
                E-mail:<br><input type="email" name="email">
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
            
            <input name="arquivo" type="file">
            <button name="upload" type="submit"value="escolha">Enviar arquivo</button>
            <input type="submit" value="Cadastrar">
        </form>
</body>
</html>