<?php
class Login
{
    private $adm;
    private $email;
    private $senha;

    public function __construct($adm, $email, $senha)
    {
        $this->adm = $adm;
        $this->email = $email;
        $this->senha = $senha;
    }
    public function emailRegistrado(PDO $pdo) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM adm WHERE email=:email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->fetchColumn()>0;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adm = $_POST["adm"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);


    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gerenciador_de_tarefas1;", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $login = new Login($adm, $email, $senha);
        if (!$login->emailRegistrado($pdo)) {
            $stmt = $pdo->prepare("INSERT INTO adm(adm, email, senha) VALUES (:adm,:email,:senha)");
            $stmt->bindParam(':adm', $adm);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            echo "Adm cadastrado com sucesso";
        }else {
            echo "Erro ao cadastrar o Adm: Email já cadastrado";
        }
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }

    try {
        $stmt->execute();
        echo "Adm cadastrado";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário " . $e->getMessage();
    }
}
?>