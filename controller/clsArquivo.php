<?php
    class clsArquivo {
        private $nomeArquivo;
        private $diretorio;
        private $arquivo;

        # propriedades
        # nomeArquivo
        public function setNomeArquivo($valor){
            $this->nomeArquivo = $valor;
        }

        public function getNomeArquivo(){
            return $this->nomeArquivo;
        }

        # diretorio
        public function setDiretorio($valor){
            $this->diretorio = $valor;
        }

        public function getDiretorio(){
            return $this->diretorio;
        }

        # arquivo
        public function setArquivo($valor){
            $this->arquivo = $valor;
        }

        public function getArquivo(){
            return $this->arquivo;
        }

        # metodo
        public function upload(){
            move_uploaded_file($this->arquivo['tmp_name'],
                $this->diretorio . '/' . $this->nomeArquivo);
        }

        public function excluir(){
            unlink($this->diretorio . '/' . $this->nomeArquivo);
        }
    }
?>
