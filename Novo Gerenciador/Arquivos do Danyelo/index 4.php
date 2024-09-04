<?php
    session_start();
    require "conexao.php";

    if ( !isset($_SESSION['id_usuario']) ) {
        header ("location:login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerenciador de Tarefas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <h1><a href="index.php">Gerenciador de Tarefas</a></h1>

        <h3>Aqui você encontra todas as suas tarefas e contatos, podendo criar, editar e excluí-los livremente.</h3>

        <?php
            if ( isset($_GET['tarefa_criada']) ) {
                echo $_GET['tarefa_criada'] == 'true' ?
                "<h3>Tarefa criada com sucesso!" : "";

                echo $_GET['tarefa_criada'] == 'false' ?
                "<h3>Erro na criação da tarefa! Verifique se todos os campos necessários foram preenchidos corretamente e tente novamente." : "";
                // Forma ternária de verificação se a tarefa foi marcada como criada ou não, não está no booleano de verdade, mas funciona;
            }

            if ( isset($_GET['contato_criado']) ) {
                echo $_GET['contato_criado'] == 'true' ?
                "<h3>Contato criado com sucesso!</h3>" : "";

                echo $_GET['contato_criado'] == 'false' ?
                "<h3>Erro na criação do contato! Verifique se os campos foram preenchidos corretamente e tente novamente.</h3>" : "";
            }

            if ( isset($_GET['tarefa_editada']) ) {
                echo $_GET['tarefa_editada'] == 'true' ?
                "<h3>Tarefa editada com sucesso!</h3>" : "";

                echo $_GET['tarefa_editada'] == 'false' ?
                "<h3>Erro na edição da tarefa! Verifique se os campos foram preenchidos corretamente e tente novamente.</h3>" : "";
            }

            if ( isset($_GET['contato_editado']) ) {
                echo $_GET['contato_editado'] == 'true' ?
                "<h3>Contato editado com sucesso!</h3>" : "";

                echo $_GET['contato_editado'] == 'false' ?
                "<h3>Erro na edição do contato! Verifique se os campos foram preenchidos corretamente e tente novamente.</h3>" : "";
            }

            if ( isset($_GET['conclusao']) ) {
                echo $_GET['conclusao'] == 'concluida' ?
                "<h3>Tarefa marcada como concluída!</h3>" : "";

                echo $_GET['conclusao'] == 'cancelada' ?
                "<h3>Tarefa marcada como cancelada!</h3>" : "";

                echo $_GET['conclusao'] == 'erro' ?
                "<h3>Erro na conclusão da tarefa.</h3>" : "";
            }

            if ( isset($_GET['tarefa_excluida']) ) {
                echo $_GET['tarefa_excluida'] == 'true' ?
                "<h3>Tarefa excluída com sucesso!</h3>" : "";

                echo $_GET['tarefa_excluida'] == 'false' ?
                "<h3>Erro na exclusão da tarefa.</h3>" : "";
            }

            if ( isset($_GET['contato_excluido']) ) {
                echo $_GET['contato_excluido'] == 'true' ?
                "<h3>Contato excluído com sucesso!</h3>" : "";

                echo $_GET['contato_excluido'] == 'false' ?
                "<h3>Erro na exclusão do contato.</h3>" : "";
            }
        ?>

        <h2>Tarefas</h2>

        <input type="button" value="Adicionar Tarefa">
        <input type="button" value="Ocultar lista de tarefas">

        <input type="button" value="Mostrar lista de tarefas">

        <form method="post" action="alterar_conclusao.php?acao=concluir">
            <input type="submit" name="concluir" value="Marcar como concluída(s)">
            <input type="submit" name="cancelar" value="Marcar como cancelada(s)" formaction="alterar_conclusao.php?acao=cancelar">

            <input type="submit" name="editarT" value="Editar tarefa" formaction="editar.php">
            <input type="submit" name="excluirT" value="Excluir tarefa" formaction="excluir.php?acao=excluirT">

            <input type="search" placeholder="Encontre uma tarefa">
            <input type="submit" value="Pesquisar">

            <table>
                <tbody>
                <?php
                    @$id_usuario = $_SESSION['id_usuario'];

                    if ( $id_usuario ) {
                    @$lista_tarefas = mysqli_query ( $conexao, "SELECT * FROM tarefas WHERE id_usuario = $id_usuario");

                    if ( mysqli_num_rows($lista_tarefas) > 0 ) {
                    while ( $resultados = mysqli_fetch_assoc($lista_tarefas) ) {
                ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="selecionadas[]" value="<?= $resultados['id_tarefas'] ?>">
                            <a href=""> <?= $resultados['nome_tarefa'] ?> </a>
                        </td>
                    </tr>
                <?php } }

                    else {
                ?>
                    <tr>
                        <td>
                            <a href="">Não há tarefas para exibir, clique aqui para criar uma agora.</a>
                        </td>
                    </tr>

                <?php } }
                ?>

                </tbody>
            </table>

        <input type="button" value="Marcar todas as tarefas como concluídas">
        <input type="button" value="Marcar todas as tarefas como canceladas">
        <input type="submit" name="apagar_tarefas" value="Apagar todas as tarefas" formaction="excluirtodas_tarefas.php">
        </form>

        <h3>Aqui você encontra todos os detalhes da tarefa selecionada, podendo editá-la, alterar seu status ou excluí-la utilizando os botões acima.</h3>
        <h4></h4>
        <p></p>

        <h4>Data e Hora</h4>
        <p></p>

        <h4>Local</h4>
        <p></p>

        <h4>Contatos envolvidos</h4>
        <p></p>

        <input type="button" value="Voltar a lista de tarefas">

        <h3>Aqui é onde você cria-rá a sua tarefa.</h3>
        <form action="criar_tarefa.php" method="post">
            <label>Nome da Tarefa:</label>
            <input type="text" name="nome_tarefa" required>

            <label>Descrição:</label>
            <textarea name="descricao_tarefa"></textarea>

            <Label>Data e Hora da Realização:</label>
            <input type="datetime-local" name="data_tarefa">

            <label>Local da Tarefa:</label>
            <input type="text" name="local_tarefa">

            <?php include("escolher_contato_tarefa.php") ?>

            <input type="button" value="Adicionar mais um contato envolvido">

            <input type="submit" value="Criar Tarefa">
        </form>

        <h2>Contatos</h2>

        <form action="editar.php" method="post">
        <input type="button" value="Adicionar Contato">
        <input type="button" value="Ocultar lista de contatos">

        <input type="button" value="Mostrar lista de contatos">

        <input type="submit" value="Editar Contato" name="editarC">
        <input type="submit" value="Excluir Contato" name="excluirC" formaction="excluir.php?acao=excluirC">

        <input type="search" placeholder="Encontre um contato">
        <input type="submit" value="Pesquisar">

        <table>
            <tbody>
                <?php
                if ( $id_usuario ) {
                @$lista_contatos = mysqli_query ( $conexao, "SELECT * FROM contatos WHERE id_usuario = $id_usuario");

                if ( mysqli_num_rows($lista_contatos) > 0 ) {
                while ( $resultados = mysqli_fetch_assoc($lista_contatos) ) {
            ?>
                <tr>
                    <td>
                        <input type="checkbox" name="selecionados[]" value="<?= $resultados['id_contato'] ?>">
                        <a href=""> <?= $resultados['nome_contato'] ?> </a>
                    </td>
                </tr>
            <?php } }

                else {
            ?>
                <tr>
                    <td>
                        <a href="">Não há contatos para exibir, clique aqui para criar um agora.</a>
                    </td>
                </tr>

            <?php } }
            ?>
            </tbody>
        </table>

        <input type="submit" name="apagar_contatos" value="Apagar todos os contatos" formaction="excluirtodos_contatos.php">

        </form>

        <h3>Aqui você encontra todos os detalhes do contato selecionado, podendo editá-lo ou excluí-lo utilizando os botões acima.</h3>
        <h4></h4>

        <h4>Telefone</h4>
        <p></p>

        <h4>E-mail</h4>
        <p></p>

        <h4>Endereço</h4>
        <p>Rua:</p>
        <p>Cidade:</p>
        <p>Estado:</p>
        <p>CEP:</p>

        <h4>Redes Sociais e Sites</h4>
        <a href=""></a>

        <input type="button" value="Voltar a lista de contatos">

        <h3>Aqui você cria-rá os seus contatos.</h3>

        <form method="post" action="criar_contato.php">
            <h4>Informações Pessoais</h4>
            <label>Nome do Contato:</label>
            <input type="text" name="nome_contato" required>

            <label>Telefone:</label>
            <input type="tel" name="telefone">

            <label>E-mail:</label>
            <input type="email" name="email">

            <label>Adicione um link de uma rede social ou site deste contato.</label>
            <input type="text" name="link_site">

            <input type="button" value="Adicione mais um link">

            <h4>Endereço</h4>
            <label>Rua:</label>
            <input type="text" name="rua">

            <label>Cidade:</label>
            <input type="text" name="cidade">

            <label>Estado:</label>
            <select name="estado">
                <option value="">Selecione</option>
            </select>

            <label>CEP:</label>
            <input type="number" name="cep">

            <input type="submit" value="Criar Contato">
        </form>

        <h3>Clicando no seu nome de usuário você terá opções para editá-lo ou sair da sessão.</h3>

        <input type="button" value="<?= @$_SESSION['usuario'] ?>">
        <a href="">Alterar senha</a>
        <a href="sair_sessao.php">Sair da sessão</a>

        <form method="post" enctype="multipart/form-data">
            <label for="">Selecione uma foto para seu perfil.</label>
            <input type="file" name="foto">

            <input type="submit" value="Enviar" name="upload">
        </form>
    </body>
</html>
