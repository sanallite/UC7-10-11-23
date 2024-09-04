<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição - Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="tarefas_bd.php">
        <h1>Gerenciador de Tarefas</h1>
    </a>
<?php
    include "conectar.php";
    @$acao = $_GET['acao'];
    @$id_tarefa = $_GET['id_tarefa'];
    @$id_usuario = $_GET['id_usuario'];

    if ( $acao == 'editarTarefa' ) { 
        $tarefas = mysqli_query($conexao, "SELECT * FROM tarefas WHERE id = '$id_tarefa'");

        $tarefaEscolhida = mysqli_fetch_assoc($tarefas);
    ?>
    <form method="post">
    <fieldset>
            <legend>Edite Uma Tarefa</legend>

            <p class="texto">
                <label for="responsavel">Responsável:</label>
                <select name="responsavel" id="responsavel">
                    <option value="<?= $tarefaEscolhida['id_usuario'] ?>">Não alterar</option>

                    <?php 
                        require ("conectar.php");

                        mysqli_select_db($conexao, "gerenciador_de_tarefas");

                        $consulta = mysqli_query($conexao, "SELECT id, nome FROM usuarios");

                        while ( $dados = mysqli_fetch_assoc($consulta) ) {
                            echo "<option value='" .$dados['id']. "'>" .$dados['nome']. "</option>";
                        }
                    
                    ?>
                </select>
            </p>

            <p class="texto">
                <label for="nomeTarefa">Tarefa:</label>
                <input type="text" name="nomeTarefa" value="<?= $tarefaEscolhida['nome_tarefa']?>">
            </p>

            <p class="texto">
                <label for="desc">Descrição:</label>
                <textarea name="desc"><?= $tarefaEscolhida['descricao']?></textarea>
            </p>

            <p class="texto">
                <label for="prazo">Prazo:</label>
                <input type="text" name="prazo" value="<?= $tarefaEscolhida['prazo']?>">
            </p>

            <fieldset>
                <legend>Prioridade:</legend>

                <p>
                    <input type="radio" name="prioridade" value="<?= $tarefaEscolhida['prioridade']?>" checked>
                    <label for="prioridade">Não alterar</label>

                    <input type="radio" name="prioridade" value="Baixa">
                    <label for="prioridade">Baixa</label>

                    <input type="radio" name="prioridade" value="Média">
                    <label for="prioridade">Média</label>

                    <input type="radio" name="prioridade" value="Alta">
                    <label for="prioridade">Alta</label>
                </p>
        <?php
            if ( $tarefaEscolhida['conclusao'] == "Não" ) { ?>
                <p>
                    <label for="concluida">Concluida?</label>
                    <input type="checkbox" name="concluida" value="Sim">
                </p>
        <?php }
        
            else if ( $tarefaEscolhida['conclusao'] == "Sim" ) { ?>
                <p>
                    <label for="concluida">Concluida?</label>
                    <input type="checkbox" name="concluida" value="Sim" checked>
                </p>
        <?php } ?>
            </fieldset>

            <p>
                <input type="submit" value="Alterar">
            </p>
        </fieldset>
    </form>
<?php 
        if ( $_SERVER['REQUEST_METHOD'] ==='POST' ) {
            $nomeTarefa = $_POST['nomeTarefa'];
            $desc = $_POST['desc'];
            $prazo = $_POST['prazo'];
            $prioridade = $_POST['prioridade'];
            $concluida = $_POST['concluida'];
            $responsavel = $_POST['responsavel'];
            // nesse IF foi testado se existe dados repassados pelo metodo POST
            // ENTÃO havendo dados repassado pelo metodo post, serão repassados,para as variáveis. 

            // a partir daqui, utilizamos o comando SQL para alterar(update)
            $query_update = "UPDATE tarefas 
            SET nome_tarefa = '$nomeTarefa',
                descricao = '$desc',
                prazo = '$prazo',
                prioridade = '$prioridade',
                conclusao = '$concluida',
                id_usuario = '$responsavel'
            WHERE id = '$id_tarefa'
            ";

            //execução da alteração
            $resultado_update = mysqli_query($conexao, $query_update);
            
            if ($resultado_update) {
                header("Location:tarefas_bd.php");
                exit();
            }
            
            else{
                echo "Erro ao atualizar os dados: ".mysqli_error($conexao);
            }
        }
    }

    else if ( $acao == 'editarUsuario' ) { 
        $usuarios = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id = '$id_usuario'");

        $usuarioEscolhido = mysqli_fetch_assoc($usuarios);        
?>

    <form method="post">
        <fieldset>
            <legend>Edite Um Usuário</legend>

            <p class="texto">
                <label for="nomeUsuario">Nome:</label>
                <input type="text" name="nomeUsuario" value="<?= $usuarioEscolhido['nome'] ?>">
            </p>

            <p class="texto">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" value="<?= $usuarioEscolhido['telefone'] ?>">
            </p>

            <p class="texto">
                <label for="email">E-mail:</label>
                <input type="email" name="email" value="<?= $usuarioEscolhido['email'] ?>">
            </p>

            <p class="texto">
                <label for="senha">Altere sua senha:</label>
                <input type="password" name="senha">
            </p>

            <fieldset>
                <legend>Endereço:</legend>

                <p class="texto">
                    <label for="cidade">Rua:</label>
                    <input type="text" name="rua" value="<?= $usuarioEscolhido['rua'] ?>">
                </p>

                <p class="texto">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" value="<?= $usuarioEscolhido['cidade'] ?>">
                </p>

                <p class="texto">
                    <label for="cidade">Estado:</label>
                    <select name="estado" id="estado">
                        <option value="<?= $usuarioEscolhido['estado'] ?>">Não Alterar</option>
                        <option value="PR">Paraná</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="BA">Bahia</option>
                        <option value="AL">Alagoas</option>
                        <option value="SE">Sergipe</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PB">Paraíba</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="PI">Piauí</option>
                        <option value="CE">Ceará</option>
                        <option value="MA">Maranhão</option>
                        <option value="TO">Tocantins</option>
                        <option value="GO">Goiás</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="PA">Pará</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Rorraima</option>
                        <option value="AC">Acre</option>
                        <option value="DF">Distrito Federal</option>
                    </select>
                </p>

                <p class="texto">
                    <label for="cep">CEP:</label>
                    <input type="number" name="cep" value="<?= $usuarioEscolhido['cep'] ?>">
                </p>
            </fieldset>

            <p>
                <input type="submit" value="Alterar">
            </p>
        </fieldset>
    </form>
<?php 
    if ( $_SERVER['REQUEST_METHOD'] ==='POST' ) {
        $nomeUsuario = $_POST['nomeUsuario'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        // nesse IF foi testado se existe dados repassados pelo metodo POST
        // ENTÃO havendo dados repassado pelo metodo post, serão repassados,para as variáveis. 

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // a partir daqui, utilizamos o comando SQL para alterar(update)
        $query_update = "UPDATE usuarios 
        SET nome = '$nomeUsuario',
            telefone = '$telefone',
            email = '$email',
            senha = '$senhaHash',
            rua = '$rua',
            cidade = '$cidade',
            estado = '$estado',
            cep = '$cep'
        WHERE id = '$id_usuario'
        ";

        //execução da alteração
        $resultado_update = mysqli_query($conexao, $query_update);
        
        if ($resultado_update) {
            header("Location:tarefas_bd.php");
            exit();
        }
        
        else{
            echo "Erro ao atualizar os dados: ".mysqli_error($conexao);
        }
    }

    }
    else {
        echo "Nada para exibir.";
    }
?>
</body>
</html>