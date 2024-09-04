<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1 class="titulo">Listagem de usuarios </h1>
    <table width="100%" class="tabela" cellspacing="0">
    <tr align="center" bgcolor="#EEE">
    
    <td><big><strong>Foto</strong></big></td>
    <td><big><strong>Id_Usuário</strong></big></td>
    <td><big><strong>Nome</strong></big></td>
    <td><big><strong>E-mail</strong></big></td>
    <td><big><strong>Telefone</strong></big></td>
    <td><big><strong>Endereço</strong></big></td>
    <td><big><strong>Cidade</strong></big></td>
    <td><big><strong>Estado</strong></big></td>
    <td><big><strong>Cep</strong></big></td>
    <td colspan="2"><big><strong>Ação</strong></big></td>
    </tr>
    <tr>
    <?php
    include("conecta.php");
    

    $dados=mysqli_query($conexao, "SELECT * FROM usuarios");

    while($item=mysqli_fetch_array($dados)){
    if (!empty($item['foto'])) {
        echo "<td> <img src='fotos/{$item['foto']}' alt='Foto do Usuário'> </td>";
    }
    /* Verificando se o usuário foi cadastrado com uma foto e se esse for o caso, exibindo a mesma. */

    else {
        echo "<td>Sem Foto</td>";
    }
    /* Caso não tenha uma foto cadastrada aparecerá uma mensagem padrão. */
        ?>
    <td><?=$item["id_usuario"]?></td>
    <td><?=$item["nome"]?></td>
    <td><?=$item["email"]?></td>
    <td><?=$item["telefone"]?></td>
    <td><?=$item["endereco"]?></td>
    <td><?=$item["cidade"]?></td>
    <td><?=$item["estado"]?></td>
    <td><?=$item["cep"]?></td>
    <td><a href="editar_usuarios.php?id=<?=$item["id_usuario"]?>"><i class="fa fa-pencil"></i>Editar</a></td>
    <td align="center" width="10" onClick="verifica('<?=$item["id_usuario"]?>')"><a href="#"><i class="fa fa-trash"></i>Excluir</a></td>

    </tr>

    <?php } ?>

    </table>
    <script>
    function verifica(id){
        if(confirm("Tem certeza que deseja Excluir permanentemente o usuário?")){
            window.location="excluir_usuarios.php?id_usuario="+id;
        }
    }
    </script>
    
</body>
</html>