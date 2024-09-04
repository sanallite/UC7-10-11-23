<?php
class Veiculo{
    public $modelo;
    public $cor;
    public $ano;

    public function Correr() {
        echo "Veículo " .$this -> modelo. " corre.<br>";
    }
    public function Manobrar() {
        echo "Veículo ". $this -> modelo. " faz manobras!<br>";
    }
}
class Carro extends Veiculo {

}
class Moto extends Veiculo {

}
$carro = new Carro();
$carro->modelo = "Marea";
$carro->cor = "vermelho";
$carro->ano = 1998;

var_dump($carro);
echo "<br>";

$moto = new Moto();
$moto->modelo = "Biz";
$moto->cor = "Preta";
$moto->ano = 1995;

var_dump($moto);
echo "<br>";

$carro -> Correr();
$moto -> Manobrar();