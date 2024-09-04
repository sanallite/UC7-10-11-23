<table border="1" >
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data e Hora</th>
                <th>Local</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include "conecta.php";
            $consulta = "SELECT * FROM tarefas";
            $resultado = mysqli_query($conexao, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo '<tr>';
                    echo '<td>' . $linha['nome'] . '</a></td>';
                    echo '<td>' . $linha['descricao'] . '</td>';
                    echo '<td>' . $linha['data e hora'] . '</td>';
                    echo '<td>' . $linha['local'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='4'>Não há tarefas criadas.</td></tr>";
            }

            ?>

        </tbody>
    </table>