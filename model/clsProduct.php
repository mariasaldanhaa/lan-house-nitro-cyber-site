<?php
    require_once('../controller/clsConexao.php');
    require_once('clsComum.php');

    class clsProduct extends clsComum {
        private $descricao;
        private $preco;
        private $categoria;
        private $estoque;
        private $precoPromocional;

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($valor) {
            $this->descricao = $valor;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($valor) {
            $this->preco = $valor;
        }
    
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($valor) {
            $this->categoria = $valor;
        }
    
        public function getEstoque() {
            return $this->estoque;
        }

        public function setEstoque($valor) {
            $this->estoque = $valor;
        }

        public function getPrecoPromocional() {
            return $this->precoPromocional;
        }

        public function setPrecoPromocional($valor) {
            $this->precoPromocional = $valor;
        }

        public function salvar($caminhoImagem) {
            $conexao = new clsConexao();
            $mysqli = $conexao->getConexao();

            $mysqli->begin_transaction();

            try {
                $sqlProduto = "INSERT INTO tb_produto
                            (nome_produto, 
                            descricao_produto,
                            preco_produto,
                            categoria_produto,
                            estoque_produto,
                            preco_promocional_produto)
                            VALUES (?, ?, ?, ?, ?, ?);";
                
                $stmtProduto = $mysqli->prepare($sqlProduto);

                $preco = (float) $this->preco;
                $estoque = (int) $this->estoque;
                $precoPromocional = ($this->precoPromocional === null ||
                                    $this->precoPromocional === '') ? null
                                    : (float) $this->precoPromocional;

                $stmtProduto->bind_param(
                    "ssdsid",
                    $this->nome,
                    $this->descricao,
                    $preco,
                    $this->categoria,
                    $estoque,
                    $precoPromocional
                );

                $stmtProduto->execute();

                // ID gerado automaticamente para o produto
                $idProduto = $mysqli->insert_id;

                $sqlImagem = "INSERT INTO imagem_produto
                            (id_produto, 
                            caminho_imagem)
                            VALUES (?, ?)";
                
                $stmtImagem = $mysqli->prepare($sqlImagem);

                $stmtImagem->bind_param(
                    "is",
                    $idProduto,
                    $caminhoImagem
                );

                $stmtImagem->execute();
                $mysqli->commit(); // confirma as alteracoes e grava no banco
                return true;
            }   catch (Throwable $erro) {
                $mysqli->rollback(); // desfaz as alteracoes feitas desde do inicio

                return false;
            }
        }
    }
?>