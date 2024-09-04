<?php
include 'conexao.php';

// Consulta para selecionar todos os contatos
$sql = "SELECT * FROM contatos";
$resultado = mysqli_query($conexao, $sql);
?>

<select name="contato_envolvido">
    <option value="">Selecione</option>
    <?php
    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Loop através dos resultados para gerar as opções do select
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo '<option value="' . $linha['id_contato'] . '">' . $linha['nome_contato'] . '</option>';
        }
    } else {
        echo '<option value="">Nenhum contato encontrado</option>';
    }
    ?>
</select>

<?php
// Feche a conexão com o banco de dados

?>

