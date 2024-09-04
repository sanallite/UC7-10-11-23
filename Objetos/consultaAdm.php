<?php
session_start();
class Login {
    protected $adm;
    protected $email;
    protected $senha;

    public function __construct($adm, $email, $senha) {
        $this->adm = $adm;
        $this->email = $email;
        $this->senha = $senha;
    }
        public function emailJaRegistrado(PDO $pdo) {
        $stmt = $pdo->prepare("SELECT senha FROM adm WHERE email = :email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        
        $hashedPassword = $stmt->fetchColumn();
        return $hashedPassword;
    }
 }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adm = $_POST['adm'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gerenciador_de_tarefas", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $login = new Login($adm, $email, $senha);
        $hashedPassword = $login->emailJaRegistrado($pdo);
        if ($hashedPassword !== false) {
          
            if (password_verify($senha, $hashedPassword)) {
                $_SESSION['login']=$adm;
                echo "login efetuado...<br>bem vindo $adm 
                DIRECIONAR PARA PAGINA DE CADASTRO DE USUÁRIOS";
                exit();
            } else {
                echo "Erro de autenticação: Email ou Senha incorretos.";
            }
        } else {
            echo "Erro de autenticação: Email ou Senha incorretos.";
    }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}
?>