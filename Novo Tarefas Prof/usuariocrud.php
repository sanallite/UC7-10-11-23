<?php
include 'classe_usuario.php';
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if (isset($_GET['id_usuario'])&& isset($_GET['opcao'])){
        $id_usuario = $_GET['id_usuario'];
    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $usuario = new Usuario();
    if (isset($_POST['opcao'])){
    $opcao = $_POST['opcao'];
    switch ($opcao){
    case "1":
    $usuario->nome=$_POST['nome'];
    $usuario->email=$_POST['email'];
    $usuario->senha=password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $usuario->telefone=$_POST['telefone'];
    $usuario->endereco=$_POST['endereco'];
    $usuario->cidade=$_POST['cidade'];
    $usuario->estado=$_POST['estado'];
    $usuario->cep=$_POST['cep'];
    $usuario->incluirUsuario();
    break;
    case "2":
        // Define as propriedades do objeto com os dados do formulário
        $usuario->id_usuario = $_POST['id_usuario'];
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->telefone = $_POST['telefone'];
        $usuario->endereco = $_POST['endereco'];
        $usuario->cidade = $_POST['cidade'];
        $usuario->estado = $_POST['estado'];
        $usuario->cep = $_POST['cep'];
        // Chama o método para atualizar o usuário no banco de dados
        $usuario->atualizarUsuario();
        break;
    default:
        echo "ação invalida";
        break;
        }
    }
}

?>