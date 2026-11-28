<?php
require_once('../controller/clsConexao.php');
require_once('../controller/clsArquivo.php');
require_once('clsComum.php');
class clsCadastro extends clsComum{
    #variaveis privadas
    private $cidade;
    private $endereco;
    private $email;
    private $telefone;
    private $foto;

    public function setcidade($valor) {
        $this->cidade = $valor;
    }
    public function getcidade() {
        return $this->cidade;
    }
    public function setendereco($valor) {
        $this->endereco = $valor;
    }
    public function getendereco() {
        return $this->endereco;
    }
    public function setemail($valor) {
        $this->email = $valor;
    }
    public function getemail() {
        return $this->email;
    }
    public function settelefone($valor) {
        $this->telefone = $valor;
    }
    public function gettelefone() {
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

    # salva dados do cadastro
    if ($novoCadastro == true) {

        # insert
        $sql = "INSERT INTO tb_cadastro(nome_cadastro,
                                        cidade_cadastro,
                                        endereco_cadastro,
                                        email_cadastro,
                                        telefone_cadastro,
                                        foto_cadastro)
                VALUES ('" . $this->nome . "',
                        '" . $this->cidade . "',
                        '" . $this->endereco . "',
                        '" . $this->email . "',
                        '" . $this->telefone . "',
                        '" . $this->nome . ".jpg');";

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