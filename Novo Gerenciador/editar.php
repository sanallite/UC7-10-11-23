<?php
    session_start();
    require "conexao.php";

    if ( isset($_SESSION) && $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $usuario = $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edição - Gerenciador de Tarefas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <h1><a href="index.php">Gerenciador de Tarefas</a></h1>

        <h3>Aqui você poderá editar a tarefa ou contato selecionados.</h3>

    <?php
        if ( isset($_POST['editarT']) ) {
            if ( isset($_POST['selecionadas'])) {
                $id_tarefa_selecionada = $_POST['selecionadas'];

                if (count($id_tarefa_selecionada) === 1 ) {
                    $tarefa = $conexao -> query ("SELECT * FROM tarefas WHERE id_tarefas = $id_tarefa_selecionada[0] AND id_usuario = $usuario");

                while ( $resultado = $tarefa -> fetch_assoc() ) {
    ?>
        <h2>Tarefas</h2>

        <a href="index.php">Voltar a Página Inicial</a>
        <a href="">Marcar tarefa como concluída</a>
        <a href="">Marcar tarefa como cancelada</a>
        <a href="">Excluir Tarefa</a>

        <form method="post" action="salvar_edicao.php?acao=editarT&id=<?= $resultado['id_tarefas'] ?>">
            <label>Nome da Tarefa:</label>
            <input type="text" value="<?= $resultado['nome_tarefa'] ?>" name="novoNomeTarefa">

            <label>Descrição:</label>
            <textarea name="novaDescricao"><?= $resultado['descricao'] ?></textarea>

            <Label>Data e Hora da Realização:</label>
            <input type="datetime-local" value="<?= $resultado['data_hora'] ?>" name="novaData">

            <label>Local da Tarefa:</label>
            <input type="text" value="<?= $resultado['local'] ?>" name="novoLocal">

            <label>Contatos Envolvidos:</label>
            <select>
                <option value="">Não alterar</option>
            </select>

            <input type="button" value="Adicionar mais um contato envolvido">

            <input type="submit" value="Salvar edição">
        </form>

        <h2>Contatos</h2>

        <input type="button" value="Ocultar lista de contatos">

        <input type="button" value="Mostrar lista de contatos">

        <form>
            <input type="search" placeholder="Encontre um contato">
            <input type="submit" value="Pesquisar">
        </form>

        <table>
            <tbody>
                <tr>
                    <td>
                        <a href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php }
            }

            else {
                echo "Só é permitido selecionar uma tarefa para editar por vez!";
            }

            }

            else {
                echo "<h3>Nenhuma tarefa selecionada.</h3>";
            }
        }
        else if ( isset($_POST['editarC']) ) {
            if ( isset($_POST['selecionados']) ) {
                $id_contato_selecionado = $_POST['selecionados'];

                if (count($id_contato_selecionado) === 1 ) {
                    $contato = $conexao -> query ("SELECT * FROM contatos WHERE id_contato = $id_contato_selecionado[0] AND id_usuario = $usuario");

                while ( $resultado = $contato -> fetch_assoc() ) {
    ?>

        <h2>Contatos</h2>

        <a href="index.php">Voltar a Página Inicial</a>
        <a href="">Excluir Contato</a>

        <form method="post" action="salvar_edicao.php?acao=editarC&id=<?= $resultado['id_contato'] ?>">
            <h4>Informações Pessoais</h4>
            <label>Nome do Contato:</label>
            <input type="text" name="novoNomeContato" value="<?= $resultado['nome_contato'] ?>">

            <label>Telefone:</label>
            <input type="tel" name="novoTelefone" value="<?= $resultado['telefone'] ?>">

            <label>E-mail:</label>
            <input type="email" name="novoEmail" value="<?= $resultado['email'] ?>">

            <label>Adicione um link de uma rede social ou site deste contato.</label>
            <input type="text" name="novoLink" value="<?= $resultado['link_site'] ?>">

            <input type="button" value="Adicione mais um link">

            <h4>Endereço</h4>
            <label>Rua:</label>
            <input type="text" name="novaRua" value="<?= $resultado['rua'] ?>">

            <label>Cidade:</label>
            <input type="text" name="novaCidade" value="<?= $resultado['cidade'] ?>">

            <label>Estado:</label>
            <select name="novoEstado">
                <option value="<?= $resultado['estado'] ?>">Não alterar</option>
            </select>

            <label>CEP:</label>
            <input type="number" name="novoCep" value="<?= $resultado['cep'] ?>">

            <input type="submit" value="Salvar edição">
        </form>

        <h2>Tarefas</h2>

        <input type="button" value="Ocultar lista de tarefas">

        <input type="button" value="Mostrar lista de tarefas">

        <form>
            <input type="search" placeholder="Encontre uma tarefa">
            <input type="submit" value="Pesquisar">
        </form>

        <table>
            <tbody>
                <tr>
                    <td>
                        <a href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php }
            }
            else {
                echo "Só é permitido editar um contato por vez!";
            }
        }

        else {
            echo "<h3>Nenhum contato selecionado.</h3>";
        }
    } ?>

        <h3>Clicando no seu nome de usuário você terá opções para editá-lo ou sair da sessão.</h3>

        <input type="button" value="<?= $_SESSION['usuario'] ?>">
        <a href="">Alterar Senha</a>
        <a href="sair_sessao.php">Sair da Sessão</a>

        <form method="post" enctype="multipart/form-data">
            <label for="">Selecione uma foto para seu perfil.</label>
            <input type="file" name="foto">

            <input type="submit" value="Enviar" name="upload">
        </form>

<?php }

    else {
        echo "Nada para exibir";
    }
?>
    </body>
</html>
