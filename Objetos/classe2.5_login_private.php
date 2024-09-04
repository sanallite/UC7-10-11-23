<?php
    class Login {
        private $email;
        private $senha;

        public function GetEmail() {
            return $this -> email;
        }

        public function SetEmail($e) {
            $this -> email = $e;
        }
        /* Definindo um valor de e-mail repassado por parâmetros utilizando a variável $e e o atribuindo no objeto. */

        public function GetSenha() {
            return $this -> senha;
        }

        public function SetSenha($s) {
            $this -> senha = $s;
        }
        /* Definindo um valor de senha repassada por parâmetros utilizando a variável $s e a atribuindo no objeto. */

        public function Logar() {
            if ( $this -> email == "marcio@a.com" and $this -> senha == "fuwa" ) {
                echo "Entrada realizada com sucesso.";
            }

            else {
                echo "Dados incorretos. Tente novamente";
            }
        }    
    }

    $logar = new Login();
    /* Objeto criado aqui. */

        $logar -> SetEmail('marcio@a.com');
        $logar -> SetSenha('fuwa');
        /* Utilizando a passagem por parâmetros para incluir os dados no objeto. */

        $logar -> Logar();
        /* Execução do método. */
?>