<?php
include('conecta.php');

if(isset($_GET['id_usuario'])&& is_numeric($_GET['id_usuario'])){

    $recid = intval($_GET['id_usuario']);
    // o intval vai converter o ID em numero inteiro -- considera parte inteira. 
    mysqli_query($conexao,"DELETE FROM `usuarios` WHERE id_usuario = $recid");

    header("location:lista_usuarios.php");

}else{
    echo "Id inválido ou inexistente !!!";
}

?>