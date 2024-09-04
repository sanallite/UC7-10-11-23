<?php
class Veiculo{
    public $modelo;
    public $cor;
    public $ano;

    public function Correr() {
        echo "Veículo Corre" . "\n";
    }
    public function Manobrar() {
        echo "Moto faz manobras!" . "\n";
    }
}
class Carro extends Veiculo { // Aqui encontramos o polimorfismo, reescrevemos os métodos herdados, nesse caso em vez de escrever na tela que o veículo corre, os obejtos da classe carro escreverão que a moto manobra(?), mas apenas os da classe claro.
    public function Correr()
    {
        $this->Manobrar();
    }

}
class Moto extends Veiculo {

}

$veiculo = new Carro();
$veiculo->Correr();

$veiculo2 = new Moto();
$veiculo2 -> Correr();
