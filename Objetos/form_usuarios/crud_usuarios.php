<?php
    include "classe_usuarios.php";

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $usuario = new Usuario();
        $usuario -> nome = $_POST['nome'];
        $usuario -> email = $_POST['email'];
        $usuario -> telefone = $_POST['telefone'];
        $usuario -> endereco = $_POST['endereco'];
        $usuario -> cidade = $_POST['cidade'];
        $usuario -> estado = $_POST['estado'];
        $usuario -> cep = $_POST['cep'];

        $usuario -> incluirUsuario();
    }
?>