<?php
session_start();

require ("conectar.php");

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM usuarios WHERE email = '$email'";

    $resultado = $conexao -> query($query);

    if ( $resultado -> num_rows == 1 ) {
        $usuario = $resultado -> fetch_assoc();

        if ( password_verify($senha, $usuario['senha']) ) {
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['email_usuario'] = $usuario['email'];

            header("location:tarefas_bd.php");
        }

        else {
            echo "Entrada malsucedido, verifique seu e-mail e senha.";
        }
    }

    else {
        echo "Entrada malsucedida, verifique seu e-mail e senha.";
    }
}

else {
    echo "Nada para exibir.";
}