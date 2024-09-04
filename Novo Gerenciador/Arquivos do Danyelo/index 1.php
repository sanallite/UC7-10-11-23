<?php session_start(); ?>

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

        <h2>Tarefas</h2>

        <input type="button" value="Adicionar Tarefa">
        <input type="button" value="Ocultar lista de tarefas">

        <a href="listadetarefas.php"><input type="button" value="Mostrar lista de tarefas"></a>

        <a href="">Marcar como concluída(s)</a>
        <a href="">Marcar como cancelada(s)</a>

        <a href="">Editar Tarefa</a>
        <a href="">Excluir Tarefa(s)</a>

        <form>
            <input type="search" placeholder="Encontre uma tarefa">
            <input type="submit" value="Pesquisar">
        </form>

        <table>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" value="Tselecionada">
                        <a href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <input type="button" value="Marcar todas as tarefas como concluídas">
        <input type="button" value="Marcar todas as tarefas como canceladas">
        <input type="button" value="Excluir todas as tarefas">

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
        <form action="criartarefa.php" method="POST">
            <label>Nome da Tarefa:</label>
            <input type="text" name="nome_tarefa">

            <label>Descrição:</label>
            <textarea name="descricao_tarefa"></textarea>

            <Label>Data e Hora da Realização:</label>
            <input type="datetime-local" name="data_tarefa">

            <label>Local da Tarefa:</label>
            <input type="text" name="local_tarefa">

            <label>Contatos Envolvidos:</label>
            <select>
                <option value="">Selecione</option>
            </select>

            <input type="button" value="Adicionar mais um contato envolvido">

            <input type="submit" value="Criar Tarefa">
        </form>

        <h2>Contatos</h2>

        <input type="button" value="Adicionar Contato">
        <input type="button" value="Ocultar lista de contatos">

        <input type="button" value="Mostrar lista de contatos">

        <a href="">Editar Contato</a>
        <a href="">Excluir Contato(s)</a>

        <form>
            <input type="search" placeholder="Encontre um contato">
            <input type="submit" value="Pesquisar">
        </form>

        <table>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" value="Cselecionado">
                        <a href=""></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <input type="button" value="Excluir todos os contatos">

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

        <form>
            <h4>Informações Pessoais</h4>
            <label>Nome do Contato:</label>
            <input type="text">

            <label>Telefone:</label>
            <input type="tel">

            <label>E-mail:</label>
            <input type="email">

            <label>Adicione um link de uma rede social ou site deste contato.</label>
            <input type="text">

            <input type="button" value="Adicione mais um link">

            <h4>Endereço</h4>
            <label>Rua:</label>
            <input type="text">

            <label>Cidade:</label>
            <input type="text">

            <label>Estado:</label>
            <select>
                <option value="">Selecione</option>
            </select>

            <label>CEP:</label>
            <input type="text">

            <input type="submit" value="Criar Contato">
        </form>

        <h3>Clicando no seu nome de usuário você terá opções para editá-lo ou sair da sessão.</h3>

        <input type="button" value="<?= $_SESSION['usuario'] ?>">
        <a href="">Alterar senha</a>
        <a href="">Sair da sessão</a>

        <form method="post" enctype="multipart/form-data">
            <label for="">Selecione uma foto para seu perfil.</label>
            <input type="file" name="foto">

            <input type="submit" value="Enviar" name="upload">
        </form>
    </body>
</html>
