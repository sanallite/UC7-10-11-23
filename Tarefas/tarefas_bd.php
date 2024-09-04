<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" />
    
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <form action="incluir.php?acao=criarU" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo Usuário</legend>

            <p class="texto">
                <label for="nomeUsuario">Nome:</label>
                <input type="text" name="nomeUsuario">
            </p>

            <p class="texto">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone">
            </p>

            <p class="texto">
                <label for="email">E-mail:</label>
                <input type="email" name="email">
            </p>

            <fieldset>
                <legend>Endereço:</legend>

                <p class="texto">
                    <label for="cidade">Rua:</label>
                    <input type="text" name="rua">
                </p>

                <p class="texto">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade">
                </p>

                <p class="texto">
                    <label for="cidade">Estado:</label>
                    <select name="estado" id="estado">
                        <option value="">Selecione</option>
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
                    <input type="number" name="cep">
                </p>
            </fieldset>
            
            <p class="texto">
                <label for="senha">Escolha uma senha:</label>
                <input type="password" name="senha">
            </p>

            <p class="texto">
            <label for="foto">Foto do usuário:</label>
            <input type="file" name="foto">
        </p>

            <p>
                <input type="submit" value="Cadastrar">
            </p>
        </fieldset>
    </form>

    <form action="incluir.php?acao=criarT" method="post">
        <fieldset>
            <legend>Nova Tarefa</legend>

            <p class="texto">
                <label for="responsavel">Responsável:</label>
                <select name="responsavel" id="responsavel">
                    <option value="">Selecione</option>

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
                <label for="nome">Tarefa:</label>
                <input type="text" name="nome">
            </p>

            <p class="texto">
                <label for="desc">Descrição:</label>
                <textarea name="desc"></textarea>
            </p>

            <p class="texto">
                <label for="prazo">Prazo:</label>
                <input type="text" name="prazo">
            </p>

            <fieldset>
                <legend>Prioridade:</legend>

                <p>
                    <input type="radio" name="prioridade" value="Baixa" checked>
                    <label for="prioridade">Baixa</label>

                    <input type="radio" name="prioridade" value="Média">
                    <label for="prioridade">Média</label>

                    <input type="radio" name="prioridade" value="Alta">
                    <label for="prioridade">Alta</label>
                </p>

                <p>
                    <label for="concluida">Concluida?</label>
                    <input type="checkbox" name="concluida" value="Sim">
                </p>
            </fieldset>

            <p>
                <input type="submit" value="Criar">
            </p>
        </fieldset>
    </form>

    <h2>Tarefas</h2>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluida</th>
                <th>Responsável</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $bd_tarefas = mysqli_query($conexao, "SELECT * FROM tarefas");
                // $responsaveis = $conexao -> query("SELECT nome FROM usuarios INNER JOIN tarefas WHERE tarefas.id_usuario = usuarios.id");
                // $responsavel = $responsaveis -> fetch_assoc();

                while ( $re_tarefas = mysqli_fetch_assoc($bd_tarefas) ) { ?>
                <tr>
                    <td><?= $re_tarefas['nome_tarefa'] ?></td>
                    
                    <td><?= $re_tarefas['descricao'] ?></td>

                    <td><?= $re_tarefas['prazo'] ?></td>

                    <td><?= $re_tarefas['prioridade'] ?></td>
                    
                    <td><?= $re_tarefas['conclusao'] ?></td>

                    <td><?= $re_tarefas['id_usuario'] ?></td>

                    <td>
                        <a href="editar.php?id_tarefa=<?=$re_tarefas['id']?>&acao=editarTarefa">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <a href="excluir.php?id_tarefa=<?=$re_tarefas['id']?>&acao=excluirTarefa">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>

    <h2>Usuários</h2>
    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Rua</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Foto</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $bd_usuarios = mysqli_query($conexao, "SELECT * FROM usuarios");

                while ( $re_usuarios = mysqli_fetch_assoc($bd_usuarios) ) { ?>
                <tr>
                    <td> <?= $re_usuarios['id'] ?> </td>
                    <td> <?= $re_usuarios['nome'] ?> </td>
                    <td> <?= $re_usuarios['telefone'] ?> </td>
                    <td> <?= $re_usuarios['email'] ?> </td>
                    <td> <?= $re_usuarios['rua'] ?> </td>
                    <td> <?= $re_usuarios['cidade'] ?> </td>
                    <td> <?= $re_usuarios['estado'] ?> </td>
                    <td> <?= $re_usuarios['cep'] ?> </td>
                    <td> <img src="<?= $re_usuarios['link_foto'] ?>"> </td>
                    <td>
                        <a href="editar.php?id_usuario=<?=$re_usuarios['id']?>&acao=editarUsuario">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>

                    <td>
                        <a href="excluir.php?id_usuario=<?=$re_usuarios['id']?>&acao=excluirUsuario">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
    // Fechando a conexão, pois não é mais necessária neste ponto.
    mysqli_close($conexao);
?>
