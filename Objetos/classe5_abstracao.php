<?php
    abstract class Banco {
        protected $saldo;
        protected $limite;
        protected $juros;

        public function SetSaldo($s) {
            $this -> saldo = $s;
        }

        public function GetSaldo() {
            return $this -> saldo;
        }

        abstract protected function Sacar($s);
        abstract protected function Depositar($d);
    }

    class BB extends Banco {
        public function Sacar($s) {
            /* $this -> saldo = $this -> saldo - $s; */
            $this -> saldo -= $s ;
            /* Simplificando a forma da operação. */

            echo "<hr> Sacou: ". $s;
        }

        public function Depositar($d) {
            $this -> saldo = $this -> saldo + $d;
            echo "<hr> Depositos: ". $d;
        }
    }

    $bb = new BB();
    $bb -> SetSaldo(1000);
    echo "<hr> Saldo: ". $bb -> GetSaldo();

    $bb -> Sacar(250);
    echo "<hr> Saldo: ". $bb -> GetSaldo();

    $bb -> Depositar(850);
    echo "<hr> Saldo: ". $bb -> GetSaldo();
?>