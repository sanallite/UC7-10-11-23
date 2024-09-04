<?php
include("conecta.php");

$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$endereco=$_POST['endereco'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cep=$_POST['cep'];



mysqli_query($conexao,"INSERT INTO `usuarios`(`id_usuario`, `nome`, `email`, `telefone`, `endereco`, `cidade`, `estado`, `cep`) VALUES (default,'$nome','$email','$telefone','$endereco','$cidade','$estado','$cep')");
?>