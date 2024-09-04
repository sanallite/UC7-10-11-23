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
    include("classe_usuarios.php");

    $usuario = new Usuario();
    $usuarios = $usuario -> buscarTodosUsuarios();

    if ( $usuarios ) {
        foreach ( $usuarios as $selecionado ) {
            echo "<td>{$selecionado['id_usuario']}</td>";
            echo "<td>{$selecionado['nome']}</td>";
            echo "<td>{$selecionado['email']}</td>";
            echo "<td>{$selecionado['telefone']}</td>";
            echo "<td>{$selecionado['endereco']}</td>";
            echo "<td>{$selecionado['cidade']}</td>";
            echo "<td>{$selecionado['estado']}</td>";
            echo "<td>{$selecionado['cep']}</td>";
        ?>
        <td><a href="editar_usuarios.php?id={$selecionado['id_usuario']}"><i class="fa fa-pencil"></i></a></td>
        <td align="center" width= "10" onClick="verifica<?= $selecionado['id_usuario'] ?>)"><a href="#"><i class="fa fa-trash"></i></a></td>
        <?php } 
    ?>
    </tr>
    <?php }
        else {
            echo "<h2>Nenhum usuário encontrado.</h2>";
        }
    ?>
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