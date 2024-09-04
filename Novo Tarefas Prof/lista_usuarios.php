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
    include("classe_usuario.php");
    
    $usuario = new Usuario();
    $usuarios = $usuario->buscarTodosUsuarios();
    if ($usuarios){
        foreach ($usuarios as $user){
           echo "<td>{$user["id_usuario"]}</td>";
           echo "<td>{$user["nome"]}</td>";
           echo "<td>{$user["email"]}</td>";
           echo "<td>{$user["telefone"]}</td>";
           echo "<td>{$user["endereco"]}</td>";
           echo "<td>{$user["cidade"]}</td>";
           echo "<td>{$user["estado"]}</td>";
           echo "<td>{$user["cep"]}</td>";
        ?>
        <td><a href="editar_usuarios.php?id=<?=$user["id_usuario"]?>"><i class="fa fa-pencil"></i></a></td>
        <td><a href="excluir.php?id=<?=$user["id_usuario"]?>"><a href="#"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php  
        }
         }else{
            echo "<h2> Nenhum usuário encontrado</h2>";
         }
      ?>
    </table>
   
    
</body>
</html>