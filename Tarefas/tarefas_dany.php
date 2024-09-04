<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Tarefa: <input type="text" name="nome">
            </label>
            <label>
                Descrição: <textarea name="descricao"></textarea>
            </label>
            <label>
                Prazo: <input type="text" name="prazo">
            </label>
            <fieldset>
                <legend>Prioridade:</legend>
                <label>
                    <input type="radio" name="prioridade" value="baixa" checked>baixa
                    <input type="radio" name="prioridade" value="media">media
                    <input type="radio" name="prioridade" value="alta">alta
                </label>
                <label>
                Conclusão: <input type="checkbox" name="concluida" value="sim" checked>
            </label>
            </fieldset>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
    <?php
    if(array_key_exists('nome',$_GET)){
        $nova_tarefa =[
            'nome'=>$_GET['nome'],
            'descricao'=>$_GET['descricao'],
            'prazo'=>$_GET['prazo'],
            'prioridade'=>$_GET['prioridade'],
            'concluida'=>isset($_GET['concluida'])?$_GET['concluida']:'não'

        ];
        $_SESSION['lista_tarefas'][]=$nova_tarefa;
    }
    if(array_key_exists('lista_tarefas',$_SESSION)){
        $lista_tarefas = $_SESSION['lista_tarefas'];
    }else{
        $lista_tarefas = [];
    }
    ?>
   
    <table>
        <tr>
            <th>Tarefas</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Conclusão</th>
        </tr>
        <?php
        foreach($lista_tarefas as $tarefa):?>
        <tr>
            <td><?php if(isset($tarefa['nome'])){
                echo $tarefa['nome'] ;
            }else{
                echo '';
            }?></td>
            <td><?php echo isset($tarefa['descricao'])?$tarefa['descricao']:'';?></td>
            <td><?php echo isset($tarefa['prazo'])?$tarefa['prazo']:'';?></td>
            <td><?php echo isset($tarefa['prioridade'])?$tarefa['prioridade']:'';?></td>
            <td><?php echo isset($tarefa['concluida'])?$tarefa['concluida']:'não';?></td>
        </tr>
        <?php endforeach;?>
    </table>

</body>
</html>