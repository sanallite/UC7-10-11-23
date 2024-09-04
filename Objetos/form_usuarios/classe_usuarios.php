<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class Usuario {
        public $id_usuario;
        public $nome;
        public $email;
        public $senha;
        public $telefone;
        public $endereco;
        public $cidade;
        public $estado;
        public $cep;

        public function Conectar() {
            $host = 'localhost';
            $usuario = 'root';
            $senha = '';
            $banco = 'objetos';

            $conexao = mysqli_connect($host, $usuario, $senha, $banco);

            if ( !$conexao ) {
                die ("Erro na conexão com o banco de dados:".mysqli_connect_error());
            }

            return $conexao;
        }

        public function incluirUsuario() {
            $conexao = $this -> Conectar();

            $conexao -> query ("INSERT INTO usuarios (nome, email, senha, telefone, endereco, cidade, estado, cep) VALUES ('{$this->nome}', '{$this->email}', '{$this->senha}', '{$this->telefone}', '{$this->endereco}', '{$this->cidade}', '{$this->estado}', '{$this->cep}')");

            mysqli_close($conexao);
        }

        public function buscarTodosUsuarios() {
            $conexao = $this -> Conectar();
            $resultado = $conexao -> query("SELECT * FROM usuarios");
            $usuarios = array();

            if ( mysqli_num_rows($resultado) > 0 ) {
                while ( $row = mysqli_fetch_assoc($resultado) ) {
                    $usuarios[] = $row;
                }

                return $usuarios;
                mysqli_close($conexao);
            }
        }
    }
?>