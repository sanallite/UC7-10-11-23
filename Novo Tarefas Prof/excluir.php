<?php
include('classe_usuario.php');
$usuario = new Usuario();
if ($_GET['id_usuario']){
    $usuario->id_usuario = $_GET['id_usuario'];
    $usuario->excluirUsuario();
}

?>