<?php
session_start();

require "conexao.php";

$excluirContatos = "DELETE FROM contatos";
if (mysqli_query($conexao, $excluirContatos)){
    header ("location:index.php?contatos_excluidos=true");
}else {
    header ("location:index.php?contatos_excluidos=false");
}
?>