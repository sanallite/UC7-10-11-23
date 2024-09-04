<?php
    class Login {
        private $email;
        private $senha;
        private $aluno;

        public function __construct($email,$senha, $aluno) {
            $this -> email = $email;
            $this -> senha = $senha;
            $this -> aluno = $aluno;
        }

        public function Logar() {
            if ( $this -> email == "marcio@a.com" and $this -> senha == "fuwa" ) {
                echo "Entrada realizada com sucesso.<br>";
            }

            else {
                echo "Dados incorretos. Tente novamente.<br>";
            }
        }

        public function ListarDados() {
            echo "E-mail: ".$this->email."<br>";
            echo "Senha: ".$this->senha."<br>";
            echo "Aluno: ".$this->aluno."<br>";
        }
    }

    $logar = new Login("marcio@a.com","fuwa","Márcio");
    /* Objeto criado aqui. */

    $logar -> Logar();
    /* Execução do método que verifica os dados. */

    $logar -> ListarDados();
    /* Execução do método que lista os dados né. */
?>