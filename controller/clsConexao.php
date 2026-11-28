
<?php

    class clsConexao {

        private $host;
        private $usuario;
        private $senha;
        private $banco;
        private $conexao;

        public function __construct() {

            $this->host = 'localhost';
            $this->usuario = 'root';
            $this->senha = '';
            $this->banco = 'bd_cadastro';

            $this->conexao = new mysqli(
                $this->host,
                $this->usuario,
                $this->senha,
                $this->banco
            );

            if ($this->conexao->connect_error) {
                die('Erro na conexão: ' . $this->conexao->connect_error);
            }

            $this->conexao->set_charset("utf8");
        }

        public function executaSQL($sql) {
            return $this->conexao->query($sql);
        }

}
?>
