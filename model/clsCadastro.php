<?php
require_once('../controller/clsConexao.php');
require_once('../controller/clsArquivo.php');
require_once('clsComum.php');
class clsCadastro extends clsComum{
    #variaveis privadas
    protected $senha;
    private $tipo = 'usuario';
    private $cidade;
    private $endereco;
    private $email;
    private $telefone;
    private $foto;

    public function setSenha($valor) {
        $this->senha = $valor;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setTipo($valor) {
        $permitidos = ['usuario', 'funcionario', 'administrador'];

        // so grava se for um dos tres tipos
        if (in_array($valor, $permitidos, true)) {
            $this->tipo = $valor;
        }
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setCidade($valor) {
        $this->cidade = $valor;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function setEndereco($valor) {
        $this->endereco = $valor;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setEmail($valor) {
        $this->email = $valor;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setTelefone($valor) {
        $this->telefone = $valor;
    }
    public function getTelefone() {
        return $this->telefone;
    }
   public function setFoto($valor) {
        $this->foto= $valor;
    }
    public function getFoto() {
        return $this->foto;
    }

    public function pegaCadastros(){
        $conexao = new clsConexao();
        $sql = 'SELECT * FROM tb_cadastro;';
        return $conexao->executaSQL($sql);
    }

    public function salvar($novoCadastro = true) {

    # salva foto
    $gravador = new clsArquivo();
    $gravador->setNomeArquivo($this->nome . '.jpg');
    $gravador->setDiretorio(__DIR__ . '/../view/img');
    $gravador->setArquivo($this->foto);
    $gravador->upload();

    # verificacao de senha
    $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
    
    # salva dados do cadastro
    if ($novoCadastro == true) {

        # insert
        $sql = "INSERT INTO tb_cadastro(nome_cadastro,
                                cidade_cadastro,
                                endereco_cadastro,
                                email_cadastro,
                                senha_cadastro,
                                telefone_cadastro,
                                foto_cadastro,
                                tipo)
                VALUES ('" . $this->nome . "',
                        '" . $this->cidade . "',
                        '" . $this->endereco . "',
                        '" . $this->email . "',
                        '" . $senhaHash . "',
                        '" . $this->telefone . "',
                        '" . $this->nome . ".jpg',
                        '" . $this->tipo . "');";

    } else {

        # update
        $sql = "UPDATE tb_cadastro SET
                nome_cadastro = '" . $this->nome . "',
                cidade_cadastro = '" . $this->cidade . "',
                endereco_cadastro = '" . $this->endereco . "',
                email_cadastro = '" . $this->email . "',
                telefone_cadastro = '" . $this->telefone . "',
                foto_cadastro = '" . $this->nome . ".jpg'
                WHERE id_cadastro = " . $this->id . ";";
    }

    $conexao = new clsConexao();
    return $conexao->executaSQL($sql);
    }

    public function exclui() {

    # exclui foto
    $gravador = new clsArquivo();
    $gravador->setNomeArquivo($this->nome . '.jpg');
    $gravador->setDiretorio('/../view/img');
    $gravador->excluir();

    # exclui cadastro
    $conexao = new clsConexao();
    $sql = "DELETE FROM tb_cadastro
            WHERE id_cadastro = " . $this->id . ";";

    return $conexao->executaSQL($sql);
    }    
}
?>