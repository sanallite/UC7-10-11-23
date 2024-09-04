
<?php

include('conecta.php');

$queryUsuarios = "SELECT id_usuario, nome FROM usuarios";
$resultUsuarios = mysqli_query($conexao, $queryUsuarios);

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="formulario">
        <form action="incluir.php" method="POST">
            <h1>Gerenciador de Tarefas</h1>
            <label>Responsável:
            <select name="usuario">
                    <?php
                    while ($dados = mysqli_fetch_assoc($resultUsuarios)) {
                        echo "<option value=".$dados['id_usuario'].">".$dados['nome']."</option>";
                    }
                    ?>
                </select>
            </label>
            <label>
                Tarefa:<br><input type="text" name="nome">
            </label>
            <label>
                Descrição:<br><textarea name="descricao"></textarea>
            </label>
            <label>
                Prazo:<br><input type="text" name="prazo">
            </label>
            <label> Prioridade:</label>
           
            <fieldset id="prioridade">
                  <label>
                    <input type="radio" name="prioridade" value="baixa" checked>baixa
                    <input type="radio" name="prioridade" value="media">media
                    <input type="radio" name="prioridade" value="alta">alta
                </label>
            </fieldset>
            <label class="conclusao">
                Conclusão:
                <input type="checkbox" name="concluida" value="sim" checked>
            </label>
            <input type="submit" value="Cadastrar"><br>
            </form>
            <a href="logout.php"><button>Sair</button></a>
</body>
</html>
<?php
// Fechando a conexão, pois não é mais necessária neste ponto
mysqli_close($conexao);
?>