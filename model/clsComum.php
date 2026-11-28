<?php
abstract class clsComum{
    #variaveis privadas
    protected $id;
    protected $nome;

    #propriedades 
    #id
    public function setId($valor) {
        $this->id = $valor;
    }
    public function getId() {
        return $this->id;
    }
    #nome
     public function setNome($valor) {
        $this->nome = $valor;
    }
    public function getNome() {
        return $this->nome;
    }
}
?>