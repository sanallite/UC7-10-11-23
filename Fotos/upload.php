<!DOCTYPE html>
<!-- Para melhor compatibilidade com o navegador é recomendado colocor o doctype no ínicio da página. -->
<?php
    include ("conectar.php");

    if ( isset ($_FILES['foto']) ) {
        $arquivo = $_FILES['foto'];

        if ( $arquivo['error'] )
            die ("Ocorreu uma falha ao enviar o arquivo...");

        if ( $arquivo['size'] > 10000000 )
            die ("O arquivo enviado é muito grande! Tamanho máximo: 10MB");

        $pasta = "apenas_fotos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        /* Aqui o nome do arquivo é alterado. */

        $extensao = strtolower( pathinfo($nomeDoArquivo,PATHINFO_EXTENSION) );

        if ( $extensao != "jpg" &&  $extensao != "png" && $extensao != "jpeg" ) {
            die ("Tipo de arquivo não aceito.");
        }

        else {
            $deu_certo = move_uploaded_file( $arquivo['tmp_name'], $pasta.$novoNomeDoArquivo.".".$extensao );
        }
     
        if ( $deu_certo ) {
            echo "<p>
                Arquivo enviado com sucesso! Para acessá-lo: 
                    <a target=\"_blank\" href=\"apenas_fotos/$novoNomeDoArquivo.$extensao\">
                        Clique aqui
                    </a>
                </p>";
        }

        $query = "INSERT INTO imagens (nome, link, data) VALUES (?,?,NOW())";

        $stmt = mysqli_prepare( $conexao, $query );

        $linkDoArquivo = "apenas_fotos/$novoNomeDoArquivo.$extensao";

        mysqli_stmt_bind_param ( $stmt, "ss", $novoNomeDoArquivo, $linkDoArquivo );

        mysqli_stmt_execute($stmt);

        if ( mysqli_stmt_affected_rows($stmt) > 0 ) {
            echo "Dados inseridos com sucesso!";
        }

        else {
            echo "Erro na inserção de dados no banco... " .mysqli_error($conexao);
        }

        mysqli_stmt_close($stmt);
    }

    else {
        echo "<h1>Upload de Fotos</h1>";
    }

    /* mysqli_close($conexao); */
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregamento de Imagens</title>
    <style>
        table {
            padding: 0.5em;
            border-collapse: collapse;
            margin-top: 2em;
        }

        table th, table td {
            border: solid thin black;
            padding: 0.5em;
        }

        img {
            max-width: 100px;
            /* max-height: 100px; */
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="">
        <p>
            <label for="">Selecione um arquivo:</label>
            <input type="file" name="foto">
        </p>

        <!-- <input type="submit" name="upload" value="escolha">Enviar Arquivo</input> -->
        <button name="upload" type="submit" value="escolha">Enviar arquivo</button>
        <!-- Neste caso é melhor usar um botão de tipo input para ser o metódo de enviar o arquivo, assim você pode ter um valor diferente do texto que aparece no botão.  -->
    </form>

    <table>
        <thead>
            <th>Nome do arquivo</th>
            <th>Link</th>
            <th>Data</th>
        </thead>

        <tbody>
        <?php
            $imagens_query = mysqli_query($conexao, "SELECT * FROM imagens");

            while ( $imagem = mysqli_fetch_assoc($imagens_query) ) { ?>
                <tr>
                    <td><img src="<?= $imagem['link'] ?>"></td>
                    <td>
                        <a href="<?= $imagem['link'] ?>">
                            <?= $imagem['link'] ?>
                        </a>
                    </td>
                    <td><?= $imagem['data'] ?></td>
                    <td>
                        <?= date( 'd/m/Y', strtotime($imagem['data']) ) ?>
                    </td>
                    <!-- Exibindo a data no formato dia, mês e ano, através da função date e strtotime (string to time), que é principalmente útil quando a data é registrada como texto no banco de dados. -->
                </tr>        
        <?php } ?>   
        </tbody>
    </table>
</body>
</html>