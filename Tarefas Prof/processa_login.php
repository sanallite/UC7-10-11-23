<?php
session_start();
include ("conecta.php");

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query ="SELECT * FROM `usuarios` WHERE email='$email'";
    $resultado=$conexao->query($query);

    if ($resultado->num_rows == 1){
        $usuario = $resultado->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])){
            $_SESSION['id_usuario']=$usuario['id_usuario'];
            $_SESSION['email_usuario']=$usuario['email'];

            header("location:form_tarefas.php");
        }else{
            echo "Login Inválido: Verifique o E-mail ou a Senha.";
        }

    }

}




?>