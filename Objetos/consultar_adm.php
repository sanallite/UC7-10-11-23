<?php
session_start();

class Login
{
    protected $adm;
    protected $email;
    protected $senha;

    public function __construct($adm, $email, $senha)
    {
        $this->adm = $adm;
        $this->email = $email;
        $this->senha = $senha;
    }
    public function emailRegistrado(PDO $pdo) {
        $stmt = $pdo->prepare("SELECT senha FROM adminstradores WHERE email=:email");
        $stmt -> bindParam(':email', $this->email);
        $stmt -> execute();
        $hash_senha = $stmt -> fetchColumn();
        return $hash_senha;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adm = $_POST["adm"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gerenciador_de_tarefas;", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $login = new Login($adm, $email, $senha);

        $hash_senha = $login -> emailRegistrado($pdo);
        if ( $hash_senha !== false ) {
            if ( password_verify($senha, $hash_senha) ) {
                echo "Bem vindos, especialmente você ".$adm."!";
                $_SESSION['login'] = $adm;
                header ("location:novo_arquivo.php");
                exit();
            }

            else {
                echo "Erro de autênticação. E-mail ou senha incorretos, tente novamente.";
            }
        }

        /* if ( !$login -> emailRegistrado($pdo) ) {
            $stmt = $pdo->prepare("INSERT INTO adm(adm, email, senha) VALUES (:adm,:email,:senha)");
            $stmt->bindParam(':adm', $adm);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            echo "Adm cadastrado com sucesso";
        }else {
            echo "Erro ao cadastrar o Adm: Email já cadastrado";
        } */
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }

    /* try {
        $stmt -> execute();
        echo "Adm cadastrado";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário " . $e->getMessage();
    } */
}
?>