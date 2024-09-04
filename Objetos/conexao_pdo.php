<?php
    function novaConexao( $banco = 'gerenciador_de_tarefas' ) {
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';

        try {
            $conectar = new PDO("mysql:host = $servidor; dbname = $banco", $usuario, $senha);
            return $conectar;
        }

        catch (PDOException $e) {
            die ('Erro: '. $e -> getMessage());
        }
    }
    
    novaConexao();
    echo "Conectado";
?>