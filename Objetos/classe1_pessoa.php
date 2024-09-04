<?php
    class Pessoa {
        public $nome;
        public $idade;

        public function falar() {
            echo $this->nome." diz: Oi, tudo bem? :D<br>";
        }

        public function falarIdade() {
            echo $this->nome." tem ".$this->idade." anos de idade.";
        }
    }
    /* Criando a classe, definindo seus atributos e métodos. */

    $aluno = new Pessoa();
    $aluno->nome = "Márcio Teodoro";
    $aluno->idade = 15;
    /* Criando um objeto a partir da classe e definindo seus atributos. */

    $aluno->falar();
    /* Fazendo o objeto criado acionar uma função. */

    echo $aluno->nome."<br>";
    echo $aluno->idade."<br>";

    var_dump($aluno);
    echo "<hr>";

    $aluno2 = new Pessoa();
    $aluno2->nome = "Irys";
    $aluno2->idade = 19;

    echo $aluno2->nome."<br>";
    echo $aluno2->idade."<br>";

    /* var_dump($aluno2); */
    echo "<hr>";

    $aluno2->falarIdade();
?>