<?php
    class Entrada {
        private $adm;
        private $email;
        private $senha;

        public function __construct($adm, $senha, $email) {
            $this -> adm = $adm;
            $this -> email = $email;
            $this -> senha = $senha;
        }

        public function emailRegistrado(PDO $pdo) {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM adminstradores WHERE email=:email");
            $stmt -> bindParam(':email', $this -> email);
            $stmt -> execute();
            return $stmt -> fetchColumn() > 0;
        }
    }

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $adm = $_POST['adm'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=gerenciador_de_tarefas", 'root', '');
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $entrada = new Entrada($adm, $email, $senha);

            if ( !$entrada -> emailRegistrado($pdo) ) {
                $stmt = $pdo->prepare("INSERT INTO adminstradores(nome_adm, email, senha) VALUES (:adm,:email,:senha)");
                $stmt -> bindParam(':adm', $adm);
                $stmt -> bindParam(':email', $email);
                $stmt -> bindParam(':senha', $senha);
            }

            else {
                echo "Erro ao cadastrar o Adm: Email já cadastrado";
            }
        }
        
        catch (PDOException $e) {
            die ("Erro de conexão: ".  $e -> getMessage());
        }

        $stmt = $pdo -> prepare("INSERT INTO adminstradores (nome_adm, email, senha) VALUES (:adm,:email,:senha)");
        $stmt -> bindParam(':adm', $adm);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':senha', $senha);

        try {
            $stmt -> execute();
            echo "Adminstrador cadastrado com sucesso!";
        }

        catch (PDOException $e){
            echo "Erro ao cadastrar usuário. ". $e ->getMessage();
        }
    }
?>