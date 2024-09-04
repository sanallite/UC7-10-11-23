<?php
    session_start();

    require "conexao.php";
    if ( isset($_SESSION) && $_SERVER["REQUEST_METHOD"] == "POST" ) {
        $nome_contato = $_POST["nome_contato"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $link_site = $_POST["link_site"];
        $rua = $_POST["rua"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $usuario = $_SESSION['id_usuario'];

        // Verifica se todos os campos foram preenchidos.
        if ( !empty( $nome_contato ) ) {
            // Insere os dados no banco de dados
            @$contato_criado = mysqli_query( $conexao, "INSERT INTO `contatos`(`nome_contato`, `id_usuario` ,`telefone`, `email`, `link_site`, `rua`, `cidade`, `estado`, `cep`)
            VALUES ('$nome_contato', '$usuario', '$telefone', '$email', '$link_site', '$rua', '$cidade', '$estado', '$cep')" );

        }

        if ( $contato_criado ) {
            // echo "Tarefa criada com sucesso!";
            header ( "location:index.php?contato_criado=true" );
        }

        else {
            // echo "Erro ao criar a tarefa: ";
            header ( "location:index.php?contato_criado=false" );
        }
    }

    else {
        // Fecha a conexão com o banco de dados.
        $conexao -> close();

        echo "Nada para exibir.";
    }
?>
