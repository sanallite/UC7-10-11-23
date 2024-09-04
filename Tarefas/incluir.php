<?php
    $acao = $_GET['acao'];
    include "conectar.php";

    if ( isset($_FILES['foto']) ) {
        $foto = $_FILES['foto'];

        if ( $foto['error'] )
            die("Erro no envio do arquivo");

        if ( $foto['size'] > 10000000)
            die("O arquivo enviado é muito grande!");

        $pasta = "fotos/";
        $nomeDaFoto = $foto['name'];
        $novoNomeDaFoto = uniqid();

        $extensao = strtolower( pathinfo($nomeDaFoto,PATHINFO_EXTENSION) );
        if ( $extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" )
            die ("Tipo de arquivo não aceito.");

        $fotoEnviada = move_uploaded_file( $foto['tmp_name'], $pasta.$novoNomeDaFoto.".".$extensao );

        $linkDaFoto = $pasta.$novoNomeDaFoto.".".$extensao;

        if ( !$fotoEnviada ) {
            echo "Erro no envio da foto.";
        }
    }

    else {
        $linkDaFoto = "Sem Foto";
    }

    if ( $acao == "criarT" ) {
        $nomeTarefa = $_POST['nome'];
        $descricao = $_POST['desc'];
        $prazo = $_POST['prazo'];
        $prioridade = $_POST['prioridade'];

        if ( isset($_POST['concluida']) ) {
            $concluida = 'Sim';
        }

        else {
            $concluida = 'Não';
        }

        $usuario = $_POST['responsavel'];

        if ( !empty($usuario) && !empty($nomeTarefa) ) {
            $tarefaCriada = mysqli_query( $conexao, "INSERT INTO `tarefas`(`id`, `nome_tarefa`, `descricao`, `prazo`, `prioridade`, `conclusao`, `id_usuario`) 
            VALUES (default,'$nomeTarefa','$descricao','$prazo','$prioridade','$concluida', '$usuario')"
            );
        }
        // Verificando se os campos foram deixados vazios, pois esses dados não podem ser nulos no banco de dados, então só se forem definidos a tarefa será salva no BD.

        if ( $tarefaCriada ) {
            header("location:tarefas_bd.php");
        }

        else {
            echo "Erro na criação da tarefa...";
        }
    }

    else if ( $acao == "criarU" ) {
        $nomeUsuario = $_POST['nomeUsuario'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rua = $_POST['rua'];
        $cidade = $_POST['cidade'];

        if ( !empty($_POST['estado']) ) {
           $estado = $_POST['estado'];
        }

        else {
            $estado = "";
        }

        $cep = $_POST['cep'];

        if ( !empty($nomeUsuario) && !empty($senha) && !empty($cidade) ) {
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $usuarioCriado = mysqli_query($conexao, "INSERT INTO `usuarios`(`id`, `nome`, `telefone`, `email`, `senha`, `rua`, `cidade`, `estado`, `cep`, `link_foto`)
            VALUES (default,'$nomeUsuario','$telefone','$email','$senhaCriptografada','$rua','$cidade','$estado','$cep', '$linkDaFoto')"
            );
            // Verificando se os campos foram deixados vazios, pois esses dados não podem ser nulos no banco de dados, então só se forem definidos o usuário será salvo no BD e a senha só será criptografada se não for vazia.
        }

        if ( $usuarioCriado ) {
            header("location:tarefas_bd.php");
        }

        else {
            echo "Erro na criação do usuário...";
        }
    }
?>
