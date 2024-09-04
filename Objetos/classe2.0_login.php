<?php
    class Login {
        public $email;
        public $senha;

        public function Logar () {
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
        $logar -> email = "marcio@a.com";
        /* Método que será incluso no objeto. */
        $logar -> senha = "fuwa";
        $logar -> Logar();
        /* Execução do método. */
?>