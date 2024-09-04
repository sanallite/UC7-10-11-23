<?php
include 'conexao.php';
    if ( $conexao ) {
        // Consulta para selecionar todos os contatos
        $sql = "SELECT * FROM contatos";
        $resultado = mysqli_query($conexao, $sql);
        ?>

        <select name="contato_envolvido">
            <?php
            // Verifica se a consulta retornou resultados
            if (mysqli_num_rows($resultado) > 0) {
                echo "<option value=''>Selecione</option>";

                // Loop através dos resultados para gerar as opções do select
                while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                    <option value="<?= $linha['id_contato'] ?>">
                        <?= $linha['nome_contato'] ?>
                    </option>
                <?php }
            }

            else {
                echo '<option value="">Nenhum contato encontrado</option>';
            }
            ?>
        </select>
<?php }
    else {
        echo "Nada para exibir.";
    }
?>

