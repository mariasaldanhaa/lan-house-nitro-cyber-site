<?php
    require_once("../model/clsComum.php");
    require_once("../controller/clsConexao.php");

    class clsUsuario extends clsComum {
        public function buscarPorEmail($email) {
            $conexao = new mysqli("localhost", "root", "", "bd_nitro_cyber");
            $conexao->set_charset("utf8mb4"); # codificacao dos caraacteres

            $sql = $conexao->prepare("
                        SELECT id_cadastro, 
                                nome_cadastro, 
                                senha_cadastro, 
                                tipo 
                        FROM tb_cadastro 
                        WHERE email_cadastro = ?");
            $sql->bind_param("s", $email);
            $sql->execute();

            return $sql->get_result()->fetch_assoc();
        }

        public function buscarPorId($id) {
            $conexao = new mysqli("localhost", "root", "", "bd_nitro_cyber");
            $conexao->set_charset("utf8mb4"); # codificacao dos caraacteres

            $sql = $conexao->prepare("
                        SELECT id_cadastro, 
                                nome_cadastro,
                                cidade_cadastro,
                                email_cadastro,
                                endereco_cadastro,
                                telefone_cadastro,
                                senha_cadastro, 
                                tipo,
                                foto_cadastro
                        FROM tb_cadastro 
                        WHERE id_cadastro = ?");
                        
            $sql->bind_param("i", $id);
            $sql->execute();

            return $sql->get_result()->fetch_assoc();
        }
    }
?>