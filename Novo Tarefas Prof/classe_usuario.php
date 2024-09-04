<?php
class Usuario{
    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $cep;

    private function conectar(){
        $host = 'localhost';
        $usuario ='root';
        $senha = '';
        $banco = 'gerenciador_de_tarefas';

        $conexao = mysqli_connect($host,$usuario,$senha,$banco);

        if (!$conexao){
            die('Erro de conexao ao banco de dados:'.mysqli_connect_error());
        }
        return $conexao;
    }
    public function incluirUsuario(){
        $conexao = $this->conectar();
        $sql ="INSERT INTO usuarios(nome, email, senha, telefone, endereco, cidade, estado, cep)VALUES('$this->nome','$this->email','$this->senha','$this->telefone','$this->endereco','$this->cidade','$this->estado','$this->cep' )";
        if(mysqli_query($conexao,$sql)){
            echo "usuário adicionado com Sucesso!!!!";
        }else{
            echo "erro ao cadastrar o usuário:".mysqli_error($conexao);
        }
        mysqli_close($conexao);
    }

    public function buscarTodosUsuarios(){
        $conexao = $this->conectar();
        $sql = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexao,$sql);
        $usuarios=array();

        if(mysqli_num_rows($resultado)>0){
            while ($row = mysqli_fetch_assoc($resultado)){
                $usuarios[]=$row;
            }
        }
        return $usuarios;
        mysqli_close($conexao);

    }

    public function buscarUsuarioPorId($id){
        $conexao = $this->conectar();
        $sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
        $resultado = mysqli_query($conexao,$sql);
        if(mysqli_num_rows($resultado)>0){
            return mysqli_fetch_assoc($resultado);
        }else{
            return null;
        }
        mysqli_close($conexao);
    }

    public function atualizarUsuario(){
        $conexao = $this->conectar();
        $sql = "UPDATE usuarios SET nome='$this->nome',email='$this->email',senha='$this->senha',telefone='$this->telefone',endereco='$this->endereco',cidade='$this->cidade',estado='$this->estado',cep='$this->cep' WHERE id_usuario='$this->id_usuario'";
        if (mysqli_query($conexao,$sql)){
            header("location:lista_usuarios.php");
        }else{
            echo "Erro ao atualizar o usuário:".mysqli_error($conexao);
        }
        mysqli_close($conexao);
    }

    public function excluirUsuario(){
        $conexao = $this->conectar();
        $sql="DELETE FROM usuarios WHERE id_usuario=$this->id_usuario";
        if (mysqli_query($conexao,$sql)){
            header("location:lista_usuarios.php");
    }else{
        echo "erro ao excluir usuario:".mysqli_error($conexao);
    }
    mysqli_close($conexao);
}
}

?>