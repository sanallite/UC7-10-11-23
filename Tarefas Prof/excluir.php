<?php
include('conecta.php');

// Verifica se o parâmetro 'id_usuario' foi fornecido e é um número inteiro
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {

    $recid = intval($_GET['id_usuario']);
    // a funcão intval converte o id em numero inteiro -- usamos isso quando o id é digitado. 

    // Recebendo o id do usuário, passado pelo GET da lista.
    mysqli_query($conexao, "DELETE FROM usuarios WHERE id_usuario = $recid");

    header("location: lista_usuarios.php");

} else {

    echo "ID de usuário inválido!";

}
?>